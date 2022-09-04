function preventKeyBoardScroll(e) {
    var keys = [32, 33, 34, 35, 37, 38, 39, 40];
    if (keys.includes(e.keyCode)) {
        e.preventDefault();
        return false;
    }
}

function disable() {
    document.addEventListener('keydown', preventKeyBoardScroll);
    document.querySelector("body").classList.add('disableScroll')
}

function enable() {
    document.removeEventListener('keydown', preventKeyBoardScroll);
    document.querySelector("body").classList.remove('disableScroll')
}

document.getElementById("prevent").addEventListener('click', disable);
document.getElementById("allow").addEventListener('click', enable);