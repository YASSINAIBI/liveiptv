let Mytext = document.getElementById('text'),
    Mycount = document.getElementById('count'),
    maxlength = Mytext.getAttribute('maxlength');

    Mycount.innerHTML = "500/500";

    Mytext.oninput = function(){
        Mycount.innerHTML = "500/ ";
        Mycount.innerHTML += maxlength - this.value.length;
    }

let Myinput_username = document.querySelector('input.username');
    Myinput_username.onfocus = function(){
        this.setAttribute('dataselect', this.getAttribute('placeholder'));
        this.setAttribute('placeholder', '');
    }
    Myinput_username.onblur = function(){
        this.setAttribute('placeholder', this.getAttribute('dataselect'));
        this.setAttribute('dataselect', '');
    }
