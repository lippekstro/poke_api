function getCookie(name) {
    // Separa todos os cookies em um array
    const cookies = document.cookie.split(';');

    // Itera sobre cada cookie
    for (let i = 0; i < cookies.length; i++) {
        // Remove espaços em branco no início e no final do cookie
        let cookie = cookies[i].trim();

        // Verifica se o cookie começa com o nome desejado
        if (cookie.startsWith(`${name}=`)) {
            // Retorna o valor do cookie
            return cookie.substring(name.length + 1);
        }
    }

    // Retorna nulo se o cookie não for encontrado
    return null;
}

if (getCookie("notfound") == 1) {
    alert("Pokemon não encontrado")
    document.cookie = "notfound=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=poke_api/html;";
}