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

window.slugify = (text)=> {
  return text
    .toString()
    .normalize('NFD') // Normaliza para eliminar acentos
    .replace(/[\u0300-\u036f]/g, '') // Elimina acentos
    .toLowerCase()
    .trim()
    .replace(/\s+/g, '-') // Reemplaza espacios con guiones
    .replace(/[^\w-]+/g, '') // Elimina caracteres no alfanuméricos
    .replace(/--+/g, '-'); // Reemplaza múltiples guiones por uno
}
 