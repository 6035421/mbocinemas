// saves any items from a form into localstorage and loads it.
// elements need to have an unique ID for it to work
//can be imported into any form

let i;

for (i of document.body.getElementsByTagName('INPUT')) {
    i.addEventListener('input', function () {
        window.localStorage.setItem(this.id, this.value);
    });


    if(i.id in window.localStorage) {
        i.value = window.localStorage.getItem(i.id);
    }
}