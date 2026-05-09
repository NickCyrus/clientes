window.getCSRF = ()=> {
    return document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute('content');
}

window.getCSRF = ()=> {
    return document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute('content');
}

window.getRandomInt = (length = 4 , max=99999999999999, min=9999,)=> {
   return Math.floor(10000 + Math.random() * 90000)
    .toString()
    .substring(1); 
}