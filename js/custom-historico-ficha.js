const msgAlerta = document.getElementById("msgAlerta");
const editForm = document.getElementById("edit-ficha-form");
const msgAlertaErroEdit = document.getElementById("msgAlertaErroEdit");
const pesquisar = document.getElementById("pesquisar-form")



//Visualizar alunos
/*
const tbody = document.querySelector("tbody")

const listarUsuarios = async () => {
    const dados = await fetch("edit_ficha_usuario.php")
    const resposta = await dados.text()
    tbody.innerHTML = resposta
}

listarUsuarios()
*/
//Visualizar informações

async function visUsuario(id) {
    //console.log("acessou" + id)
    const dados = await fetch('visualizar-historico-fichas.php?id=' + id)
    const resposta = await dados.json()
    console.log(resposta)

    if (resposta['erro']) {
        msgAlerta.innerHTML = resposta['msg'];
    } else {
        const visModal = new bootstrap.Modal(document.getElementById("visUsuarioModal"))
        visModal.show()

        document.getElementById("idUsuario").innerHTML = resposta['dados'].id
        document.getElementById("nomeUsuario").innerHTML = resposta['dados'].nome
        document.getElementById("idadeUsuario").innerHTML = resposta['dados'].idade
        document.getElementById("estaturaUsuario").innerHTML = resposta['dados'].estatura
        document.getElementById("pesoUsuario").innerHTML = resposta['dados'].peso
        document.getElementById("objetivoUsuario").innerHTML = resposta['dados'].objetivo
        document.getElementById("professorUsuario").innerHTML = resposta['dados'].professor
        document.getElementById("anamneseUsuario").innerHTML = resposta['dados'].anamnese
        document.getElementById("toraxUsuario").innerHTML = resposta['dados'].torax
        document.getElementById("abdomenUsuario").innerHTML = resposta['dados'].abdomen
        document.getElementById("cinturaUsuario").innerHTML = resposta['dados'].cintura
        document.getElementById("braco_dirUsuario").innerHTML = resposta['dados'].braco_dir
        document.getElementById("braco_esqUsuario").innerHTML = resposta['dados'].braco_esq
        document.getElementById("coxa_dirUsuario").innerHTML = resposta['dados'].coxa_dir
        document.getElementById("coxa_esqUsuario").innerHTML = resposta['dados'].coxa_esq
        document.getElementById("quadrilUsuario").innerHTML = resposta['dados'].quadril
        document.getElementById("tricepsUsuario").innerHTML = resposta['dados'].triceps
        document.getElementById("abdUsuario").innerHTML = resposta['dados'].abd
        document.getElementById("iliacaUsuario").innerHTML = resposta['dados'].iliaca
        document.getElementById("subsUsuario").innerHTML = resposta['dados'].subs
        document.getElementById("coxaUsuario").innerHTML = resposta['dados'].coxa
        document.getElementById("gordura_totalUsuario").innerHTML = resposta['dados'].gordura_total
        document.getElementById("prox_reavaliacaoUsuario").innerHTML = resposta['dados'].prox_reavaliacao
        document.getElementById("cadastroUsuario").innerHTML = resposta['dados'].cadastro
        document.getElementById("criacaoUsuario").innerHTML = resposta['dados'].criacao
        document.getElementById("edicaoUsuario").innerHTML = resposta['dados'].edicao


    }

}

async function editUsuario(id) {
    msgAlertaErroEdit.innerHTML = "";

    const dados = await fetch('visualizar-historico-fichas.php?id=' + id);
    const resposta = await dados.json();
    //console.log(resposta);

    if (resposta['erro']) {
        msgAlerta.innerHTML = resposta['msg'];
    } else {
        const editModal = new bootstrap.Modal(document.getElementById("editUsuarioModal"));
        editModal.show();
        document.getElementById("editid").value = resposta['dados'].id
        document.getElementById("editcpf").value = resposta['dados'].cpf
        document.getElementById("editnome").value = resposta['dados'].nome
        document.getElementById("editidade").value = resposta['dados'].idade
        document.getElementById("editestatura").value = resposta['dados'].estatura
        document.getElementById("editpeso").value = resposta['dados'].peso
        document.getElementById("editobjetivo").value = resposta['dados'].objetivo
        document.getElementById("editprofessor").value = resposta['dados'].professor
        document.getElementById("editanamnese").value = resposta['dados'].anamnese
        document.getElementById("edittorax").value = resposta['dados'].torax
        document.getElementById("editabdomen").value = resposta['dados'].abdomen
        document.getElementById("editcintura").value = resposta['dados'].cintura
        document.getElementById("editbraco_dir").value = resposta['dados'].braco_dir
        document.getElementById("editbraco_esq").value = resposta['dados'].braco_esq
        document.getElementById("editcoxa_dir").value = resposta['dados'].coxa_dir
        document.getElementById("editcoxa_esq").value = resposta['dados'].coxa_esq
        document.getElementById("editquadril").value = resposta['dados'].quadril
        document.getElementById("edittriceps").value = resposta['dados'].triceps
        document.getElementById("editabd").value = resposta['dados'].abd
        document.getElementById("editiliaca").value = resposta['dados'].iliaca
        document.getElementById("editsubs").value = resposta['dados'].subs
        document.getElementById("editcoxa").value = resposta['dados'].coxa
        document.getElementById("editgordura_total").value = resposta['dados'].gordura_total
        document.getElementById("editprox_reavaliacao").value = resposta['dados'].prox_reavaliacao
    }
}
editForm.addEventListener("submit", async (e) => {
    e.preventDefault()

    const dadosForm = new FormData(editForm)
    console.log(dadosForm)

    const dados = await fetch("editar-ficha.php", {
        method: "POST",
        body: dadosForm
    })

    const resposta = await dados.json()
    console.log(resposta)

    if (resposta['erro']) {
        msgAlertaErroEdit.innerHTML = resposta['msg']
    } else {
        msgAlertaErroEdit.innerHTML = resposta['msg']
        listarUsuarios()

    }
})