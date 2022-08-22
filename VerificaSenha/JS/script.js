    // let palavra = '#SenhA_|_123!'
    // let vetor1 = palavra.match(/[a-z]/g) // e,n,h
    // let vetor2 = palavra.match(/[A-Z]/g) // S,A
    // let vetor3 = palavra.match(/[0-9]/g) // 1,2,3
    // let vetor4 = palavra.match(/\W|_/g) // #,_,!
    // let vetor5 = palavra.match(/[T-Z]/g) // null

    function verSenha(){
        // cria referencia aos elementos da página
     
        let inSenha = document.getElementById("inSenha")
        let outResposta = document.getElementById("outResposta")

        // obtém o conteúdo do campo de entrada
        let senha = inSenha.value

        let erros = [] // vetor com erros

        // verifica se o tamanho da senha é inválido
        if(senha.length < 5 || senha.length > 25){
            erros.push("possui entre 5 e 25 caracteres")
        }

        // verificar se nao pussui números
        if (senha.match(/[0-9]/g) == null){
            erros.push("possuir números (no mínimo 3) ")
        }

        // verifica se não possui letras minúsculas
        if( !senha.match(/[a-z]/g) ){
            erros.push("possuir letras minúsculas (no mínimo 4) ")
        }

        // verificar se não possui letras maiúsculas ou se possui apenas 1
        if( !senha.match(/[A-Z]/g) || senha.match(/[A-Z]/g).length == 1 ){
            erros.push("possuir letras maiúsculas (no mínimo, 3) ")
        }

        // W é um metacaractere que possui um significado especial, retorna os símbolos string, mas nao underline
        if ( !senha.match(/[\W|_*@#$%!?/"]/g) ){ 
            erros.push("possuir símbolos (no mínimo, 3 ")
        }

        // se o array ERROS estiver vazio (significa que nao houve erros)
        if(erros.length == 0){
            outResposta.textContent = "SENHA VÁLIDA"
        } else {
             
            outResposta.textContent = "ERRO... a senha deve " + erros.join(", ")  
        }

    }

    // cria referencia ao botao e apos associa funciton ao evento click
    let btVerificar = document.getElementById("btVerificar")
    btVerificar.addEventListener("click", verSenha)