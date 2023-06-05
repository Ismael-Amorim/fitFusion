const msgAlerta = document.getElementById("msgAlerta");
const editForm = document.getElementById("edit-todos-form");
const msgAlertaErroEdit = document.getElementById("msgAlertaErroEdit");


//Visualizar usuarios


/*
const tbody = document.querySelector("tbody")

const listarUsuarios = async () => {
    const dados = await fetch("consultar_professores.php")
    const resposta = await dados.text()
    tbody.innerHTML = resposta
}

listarUsuarios()
*/


//Visualizar informações

async function visUsuario(id) {
    //console.log("acessou" + id)
    const dados = await fetch('visualizar-todos.php?id=' + id)
    const resposta = await dados.json()
    console.log(resposta)

    if (resposta['erro']) {
        msgAlerta.innerHTML = resposta['msg'];
    } else {
        const visModal = new bootstrap.Modal(document.getElementById("visUsuarioModal"))
        visModal.show()

        document.getElementById("idUsuario").innerHTML = resposta['dados'].id
        document.getElementById("nomeUsuario").innerHTML = resposta['dados'].nome
        document.getElementById("cpfUsuario").innerHTML = resposta['dados'].cpf
        document.getElementById("senhaUsuario").innerHTML = resposta['dados'].senha
        document.getElementById("criacaoUsuario").innerHTML = resposta['dados'].criacao
        document.getElementById("statusUsuario").innerHTML = resposta['dados'].status

    }

}

async function editUsuario(id) {
    msgAlertaErroEdit.innerHTML = "";

    const dados = await fetch('visualizar-todos.php?id=' + id);
    const resposta = await dados.json();
    //console.log(resposta);

    if (resposta['erro']) {
        msgAlerta.innerHTML = resposta['msg'];
    } else {
        const editModal = new bootstrap.Modal(document.getElementById("editUsuarioModal"));
        editModal.show();
        document.getElementById("editid").value = resposta['dados'].id;
        document.getElementById("editnome").value = resposta['dados'].nome;
        document.getElementById("editcpf").value = resposta['dados'].cpf;
        document.getElementById("editsenha").value = resposta['dados'].senha;
        document.getElementById("editstatus").value = resposta['dados'].status;
    }
}

editForm.addEventListener("submit", async (e) => {
    e.preventDefault()

    const dadosForm = new FormData(editForm)
    console.log(dadosForm)

    const dados = await fetch("editar.php", {
        method: "POST",
        body: dadosForm
    })

    const resposta = await dados.json()
    console.log(resposta)
    if (resposta['erro']) {
        msgAlertaErroEdit.innerHTML = resposta['msg']
    } else {
        msgAlertaErroEdit.innerHTML = resposta['msg']
        location.reload()

    }
})

async function apagarUsuario(id) {

    var confirmar = confirm("Tem certeza que deseja apagar o usuário selecionado?")

    if (confirmar == true) {
        const dados = await fetch('apagar.php?id=' + id)

        const resposta = await dados.json()
        if (resposta['erro']) {
            msgAlerta.innerHTML = resposta['msg']
        } else {
            msgAlerta.innerHTML = resposta['msg']
            location.reload()
        }
    }
}