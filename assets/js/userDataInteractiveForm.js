const userNameContainer = document.getElementById('username');
let userNameEditButton = userNameContainer.childNodes[3];

const userEmailContainer = document.getElementById('userEmail');
let userEmailEditButton = userEmailContainer.childNodes[3];

const userPwdContainer = document.getElementById('userPassword');
let userPwdEditButton = userPwdContainer.childNodes[3];

const userId = document.getElementById('idContainer').childNodes[1].textContent;

userNameEditButton.addEventListener('click', (e) => {
    let usernameEditor = new MemberPanelEditor();
    usernameEditor.displayForm(e, userId);
})

userEmailEditButton.addEventListener('click', (e) => {
    let userEmailEditor = new MemberPanelEditor();
    userEmailEditor.displayForm(e, userId);
})

userPwdEditButton.addEventListener('click', (e) => {
    let userPwdEditor = new MemberPanelEditor();
    userPwdEditor.displayForm(e, userId);
})