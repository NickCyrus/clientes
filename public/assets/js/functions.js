function getCSRF(){
    return document.querySelector('meta[name="csrf-token"]').content
}