Set-Alias -name e -Value Write-Host
Set-Alias -Name l -Value Read-Host

# clear variables , modules et erreurs + cls

Remove-Variable * -ErrorAction SilentlyContinue
Remove-Module *
$Error.Clear()
Clear-Host

import-module activedirectory

$csv = "C:\Scripts\wds_export.csv" #Entrez un chemin d’accès vers votre fichier d’importation CSV
$ADUsers = Import-csv $csv -Delimiter ";"

foreach ($User in $ADUsers)
{
    $Domaine = "OU=Administration_Utilisateurs,DC=wds,DC=ad"
    $Mat = $User.mat
    Write-Host "Matricule: $Mat"
    $Lastname = $User.nom
    Write-Host "Nom: $Lastname"
    $Firstname = $User.prenom
    Write-Host "Prenom: $Firstname"
    $Mail = $Firstname.tolower() + "." + $Lastname.tolower() + "@wds.fr"
    Write-Host "@Mail: $Mail"
    $OU1 = $User.ou1
    Write-Host "OU1: $OU1"
    $OU2 = $User.ou2
    Write-Host "OU2: $OU2"
    $Tel = $User.tel
    Write-Host "Tel: $Tel"
    $PC = $User.pc
    $Password = $User.mdp
    $login = $User.num
    $userobj = Get-ADUser -LDAPFilter "(SAMAccountName=$login)"
    $pcobj = Get-ADComputer -LDAPFilter "(SAMAccountName=$PC)"

    if (($OU1 -ne "") -and ($OU2 -ne ""))
    {
        $OU = "OU=$OU2,OU=$OU1,$Domaine"
        $Group = $OU2
        $GGexist = Get-ADGroup -LDAPFilter "(SAMAccountName=GG_$Group)"
        $DLexist = Get-ADGroup -LDAPFilter "(SAMAccountName=DL_$Group)"
        $Uexist = "CN=$login,OU=$OU2,OU=$OU1,$Domaine"
        Write-Host "------------------------------------------------"
        Write-Host "OU: $Group"
        Write-Host "------------------------------------------------"

    }
    elseif (($OU1 -ne "") -and ($OU2 -eq ""))
    {
        $OU = "OU=$OU1,$Domaine"
        $Group = $OU1
        $DLexist = Get-ADGroup -LDAPFilter "(SAMAccountName=DL_$Group)"
        $GGexist = Get-ADGroup -LDAPFilter "(SAMAccountName=GG_$Group)"
        $Uexist = "CN=$login,OU=$OU1,$Domaine"
        Write-Host "------------------------------------------------"
        Write-Host "OU: $Group"
        Write-Host "------------------------------------------------"

    }

    if (($DLexist -eq $null) -and ($GGexist -eq $null))
    {
        New-ADGroup `
              -Name "DL_$Group" `
              -GroupScope 0`
              -GroupCategory 1 `
              -Path "OU=Groupes,$OU" `
              -Description "Groupe DL_$Group"

        New-ADGroup `
              -Name "GG_$Group" `
              -GroupScope 1`
              -GroupCategory 1 `
              -Path "OU=Groupes,$OU" `
              -Description "Groupe GG_$Group"

        Add-ADGroupMember `
            -Identity "DL_$Group" `
            -Members "GG_$Group"

        Write-Host "------------------------------------------------"
        Write-Host "Groupes DL_$Group et GG_$Group crées"
        Write-Host "------------------------------------------------"

    }
    else
    {
        Write-Host "------------------------------------------------"
        Write-Warning "Le groupe $Group existe deja dans l'Active Directory."
        Write-Host "------------------------------------------------"
    }

    # Vérifiez si le compte utilisateur existe déjà dans AD

    if ($userobj -eq $null)
    {
        #Si un utilisateur n’existe pas, créez un nouveau compte utilisateur
        #Le compte sera créé dans I’unité d’organisation indiquée dans la variable $OU du fichier CSV ; n’oubliez pas de changer le nom de domaine dans la variable « -UserPrincipalName ».

        New-ADUser `
            -SamAccountName $login `
            -Name "$Firstname $Lastname" `
            -GivenName $Firstname `
            -Surname $Lastname `
            -UserPrincipalName $login+"@"+$Domaine `
            -Description "$Mat" `
            -OfficePhone $Tel `
            -Mobile $Tel `
            -EmailAddress $Mail `
            -ChangePasswordAtLogon $True `
            -DisplayName "$Lastname $Firstname" `
            -Office $Bureau `
            -Path "OU=Utilisateurs,$OU" `
            -AccountPassword (convertto-securestring $Password -AsPlainText -Force)`
            -Enabled $True

        Add-ADGroupMember `
            -Identity "GG_$Group" `
            -Members $login

        Write-Host "------------------------------------------------"
        Write-Host "Création de "$Firstname $Lastname" : Prénom=$Lastname Nom=$Firstname Matricule:$Mat Mail=$mail Login=$login Fichier source=$csv OU de destination= $OU Domaine="$Domaine""
        Write-Host "------------------------------------------------"
    }
    else
    {
        #Si l’utilisateur existe, éditez un message d’avertissement
        Write-Host "------------------------------------------------"
        Write-Warning "L'utilisateur $login existe deja dans l'Active Directory."
        Write-Host "------------------------------------------------"
    }

    if ($PC -ne "")
    {
        if ($pcobj -eq $null)
        {
            New-ADComputer `
                    -Name "$PC" `
                    -SamAccountName "$PC" `
                    -Description "Propriétaire: $Lastname $Firstname" `
                    -Path "OU=Ordinateurs,$OU"

            Write-Host "------------------------------------------------"
            Write-Host "Le PC $PC a été créé avec succès."
            Write-Host "------------------------------------------------"
        }
    }
    else
    {
        Write-Host "------------------------------------------------"
        Write-Warning "La colonne PC n'est pas renseignée."
        Write-Host "------------------------------------------------"
    }
}