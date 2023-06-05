const msgAlerta = document.getElementById("msgAlerta");
const editForm = document.getElementById("edit-usuario-form");
const msgAlertaErroEdit = document.getElementById("msgAlertaErroEdit");
//Visualizar alunos

/*const tbody = document.querySelector("tbody")

const listarUsuarios = async () => {
    const dados = await fetch("edit_treino_usuario.php")
    const resposta = await dados.text()
    tbody.innerHTML = resposta
}

listarUsuarios()
*/

//Visualizar informações

async function visUsuario(id) {
    //console.log("acessou" + id)
    const dados = await fetch('visualizar.php?id=' + id)
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
        document.getElementById("segUsuario").innerHTML = resposta['dados'].seg
        document.getElementById("terUsuario").innerHTML = resposta['dados'].ter
        document.getElementById("quaUsuario").innerHTML = resposta['dados'].qua
        document.getElementById("quiUsuario").innerHTML = resposta['dados'].qui
        document.getElementById("sexUsuario").innerHTML = resposta['dados'].sex
        document.getElementById("sabUsuario").innerHTML = resposta['dados'].sab
    }

}

async function editUsuario(id) {
    msgAlertaErroEdit.innerHTML = "";

    const dados = await fetch('visualizar.php?id=' + id);
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
        document.getElementById("editseg").value = resposta['dados'].seg;
        document.getElementById("editter").value = resposta['dados'].ter;
        document.getElementById("editqua").value = resposta['dados'].qua;
        document.getElementById("editqui").value = resposta['dados'].qui;
        document.getElementById("editsex").value = resposta['dados'].sex;
        document.getElementById("editsab").value = resposta['dados'].sab;
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
})