const userNameContainer = document.getElementById('userName');
let userNameEditButton = userName.childNodes[3];

const userEmailContainer = document.getElementById('userEmail');
let userEmailEditButton = userEmail.childNodes[3];

const userPwdContainer = document.getElementById('userPwd');
let userPwdEditButton = userPwdContainer.childNodes[3];

userNameEditButton.addEventListener('click', (e) => {
    let userEmailEditor = new MemberPanelEditor();
    userEmailEditor.displayForm(e);
})

userEmailEditButton.addEventListener('click', (e) => {
    let userEmailEditor = new MemberPanelEditor();
    userEmailEditor.displayForm(e);
})

userPwdEditButton.addEventListener('click', (e) => {
    let userPwdEditor = new MemberPanelEditor();
    userPwdEditor.displayForm(e);
})