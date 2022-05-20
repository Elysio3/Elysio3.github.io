
    class Xgithub extends HTMLElement {
    constructor () {
    super();
    const template = document.querySelector('#github-template');
    const usr = template.content.cloneNode(true);
    this.attachShadow({ mode: 'open' });
    this.shadowRoot.appendChild(usr);
}

    async getUser() {
    const user = await fetch(`https://api.github.com/users/${this.getAttribute('user')}`, {
    headers: {
    Authorization: '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',
}
}).then(res => res.json());

    this.fillUser(user);
}

    fillUser(user) {
    const usr = this.shadowRoot;

    usr.querySelector('.user-account').textContent = this.getAttribute('user');
    usr.querySelector('.user-name').textContent = user.name;
    usr.querySelector('.user-avatar img').src = user.avatar_url;
    usr.querySelector('.user-repos').textContent = user.public_repos;
    usr.querySelector('.user-followers').textContent = user.followers;

    usr.querySelector('.user').classList.remove('spinner');
    usr.querySelector('.user-data').removeAttribute('hidden');
    usr.querySelector('.user-stats').removeAttribute('hidden');

    usr.querySelector('.user-github-url').href = user.html_url;
    usr.querySelector('.user-github-url').target = "_blank";
    usr.querySelector('.user-repos-url').href = user.html_url.concat('?tab=repositories');
    usr.querySelector('.user-repos-url').target = "_blank";
    usr.querySelector('.user-followers-url').href = user.html_url.concat('?tab=followers');
    usr.querySelector('.user-followers-url').target = "_blank";
}

    connectedCallback() {
    this.getUser();
}

    attributeChangedCallback() {
    this.getUser();
}
}

    if (!window.customElements.get('github-card')) {
    window.Xgithub = Xgithub;
    window.customElements.define('github-card', Xgithub)
}

        window.addEventListener('load', () => {
        const inp = document.querySelector('#username');
        const frm = document.querySelector('#create-card');
        const output = document.querySelector('#cards');

        frm.addEventListener('submit', (eve) => {
        const user = inp.value;
        let github = null;
        eve.preventDefault();
        if (user === '') { return false; }

        github = document.createElement('github-card');
        github.setAttribute('user', user);
        output.innerHTML = '';
        output.appendChild(github);
    }, true);
    });