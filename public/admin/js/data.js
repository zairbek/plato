var validate = {

    userName: function(){
        var invalideMessage = [];
        var input = this;

        if (input.validity.valueMissing) {
            invalideMessage.push('Поля незаполнено!')
        }
        if (input.validity.patternMismatch) {
            invalideMessage.push('Поля должна содержать только английские буквы!');
        }
        if (input.validity.tooLong) {
            var maxLength = input.getAttribute('maxlength');
            invalideMessage.push('Максимально допустимое количество символов: ' + maxLength);
        }
        if (input.validity.tooShort) {
            var minLength = input.getAttribute('minlength');
            invalideMessage.push('Минимально допустимое количество символов: ' + minLength);
        }

        input.addEventListener('input', function(){
            var message = invalideMessage.join(', \n');
            input.setCustomValidity(message);
        });
    },

    password: function(){
        var invalideMessage = [];
        var input = this;

        if (input.validity.valueMissing) {
            invalideMessage.push('Поля незаполнено!');
        }
        if (input.validity.patternMismatch) {
            invalideMessage.push('Пароль должен содержать только английские буквы и одна цифра!');
        }
        if (input.validity.tooLong) {
            var maxLenth = input.getAttribute('maxlength');
            invalideMessage.push('Максимально допустимое количество символов: ' + maxLenth)
        }
        if (input.validity.tooShort) {
            var minLenth = input.getAttribute('minlength');
            invalideMessage.push('Минимально допустимое количество символов: ' + minLenth)
        }

        input.addEventListener('input', function(){
            var message = invalideMessage.join(', \n');
            input.setCustomValidity(message);
        });

    },

    rePassword: function(){
        var form = document.formRegistration;
        var inputPassword = form.password;
        var inputRePassword = form.rePassword;

        var valuePassword = inputPassword.value;
        var valueRePassword = inputRePassword.value;

        var invalideMessage = [];

        if (valuePassword != valueRePassword) {
            invalideMessage.push('Пароль неверный!')
        }

        submit.addEventListener('click', function () {
            var message = invalideMessage.join(', \n');
            inputRePassword.setCustomValidity(message);
        })
    }

}

var validateLogin = {

    email: function(){
        var invalideMessage = [];
        var input = this;

        if (input.validity.valueMissing) {
            invalideMessage.push('Поля незаполнено!');
        }
        if (input.validity.patternMismatch) {
            invalideMessage.push('Пароль должен содержать только английские буквы и одна цифра!');
        }
        if (input.validity.tooLong) {
            var maxLenth = input.getAttribute('maxlength');
            invalideMessage.push('Максимально допустимое количество символов: ' + maxLenth)
        }
        if (input.validity.tooShort) {
            var minLenth = input.getAttribute('minlength');
            invalideMessage.push('Минимально допустимое количество символов: ' + minLenth)
        }

        input.addEventListener('input', function(){
            var message = invalideMessage.join(', \n');
            input.setCustomValidity(message);
        })
    },
    password: function(){
        var invalideMessage = [];
        var input = this;

        if (input.validity.valueMissing) {
            invalideMessage.push('Поля незаполнено!');
        }
        if (input.validity.patternMismatch) {
            invalideMessage.push('Пароль должен содержать только английские буквы и одна цифра!');
        }
        if (input.validity.tooLong) {
            var maxLenth = input.getAttribute('maxlength');
            invalideMessage.push('Максимально допустимое количество символов: ' + maxLenth)
        }
        if (input.validity.tooShort) {
            var minLenth = input.getAttribute('minlength');
            invalideMessage.push('Минимально допустимое количество символов: ' + minLenth)
        }

        input.addEventListener('input', function(){
            var message = invalideMessage.join(', \n');
            input.setCustomValidity(message);
        });
    },


}