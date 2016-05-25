module.exports = {
    'Lets log-in on EleveCRM': function (test) {
        test.open('http://app.elevecrm.local/login')
            .assert.exists('form[action="/login"]', 'Form Login Exists')
            .type('#login-username', 'andrei@facedigital.com.br')
            .type('#login-password', 'teste123')
            .click('button[type="submit"]')
            .waitForElement('ul.usuario')
            .assert.exists('ul.usuario', 'Logado com sucesso')
            .screenshot('login.png')
            .end();
    },
    'List all opportunities': function (test) {
        test.open('http://app.elevecrm.local/oportunidades')
            .screenshot('test2.png')
            .done();
    }
};