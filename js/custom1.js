const msgAlerta = document.getElementById("msgAlerta");
const editForm = document.getElementById("edit-Treino-form");
const msgAlertaErroEdit = document.getElementById("msgAlertaErroEdit");


//Visualizar treinos

/*
const tbody = document.querySelector("tbody")

const listarUsuarios = async () => {
    const dados = await fetch("editar_treino.php")
    const resposta = await dados.text()
    tbody.innerHTML = resposta
}

listarUsuarios()
*/

//Visualizar informações treinos

async function visTreino(id) {
    console.log("acessou " + id)
    const dados = await fetch('visualizar-treino.php?id=' + id)
    const resposta = await dados.json()
    console.log(resposta)

    if (resposta['erro']) {
        msgAlerta.innerHTML = resposta['msg'];
    } else {
        const visModal = new bootstrap.Modal(document.getElementById("visTreinoModal"))
        visModal.show()

        document.getElementById("idTreino").innerHTML = resposta['dados'].id
        document.getElementById("treinoTreino").innerHTML = resposta['dados'].treino
        document.getElementById("exercicioTreino").innerHTML = resposta['dados'].exercicio
        document.getElementById("seriesTreino").innerHTML = resposta['dados'].qtd_series
        document.getElementById("repeticoesTreino").innerHTML = resposta['dados'].qtd_repeticoes
        document.getElementById("obsTreino").innerHTML = resposta['dados'].obs
        document.getElementById("criacaoTreino").innerHTML = resposta['dados'].criacao


    }
}

async function editTreino(id) {
    msgAlertaErroEdit.innerHTML = "";

    const dados = await fetch('visualizar-treino.php?id=' + id);
    const resposta = await dados.json();
    console.log(resposta);

    if (resposta['erro']) {
        msgAlerta.innerHTML = resposta['msg'];
    } else {
        const editModal = new bootstrap.Modal(document.getElementById("editTreinoModal"));
        editModal.show();
        document.getElementById("editidTreino").value = resposta['dados'].id
        document.getElementById("edittreinoTreino").value = resposta['dados'].treino
        document.getElementById("editexercicioTreino").value = resposta['dados'].exercicio
        document.getElementById("editseriesTreino").value = resposta['dados'].qtd_series
        document.getElementById("editrepeticoesTreino").value = resposta['dados'].qtd_repeticoes
        document.getElementById("editobsTreino").value = resposta['dados'].obs

    }
}

editForm.addEventListener("submit", async (e) => {
    e.preventDefault()

    const dadosForm = new FormData(editForm)
    console.log(dadosForm)

    const dados = await fetch("editar-treino.php", {
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

async function apagarTreino(id) {

    var confirmar = confirm("Tem certeza que deseja apagar o exercício selecionado?")

    if (confirmar == true) {
        const dados = await fetch('apagar-treino.php?id=' + id)

        const resposta = await dados.json()
        if (resposta['erro']) {
            msgAlerta.innerHTML = resposta['msg']
        } else {
            msgAlerta.innerHTML = resposta['msg']
            location.reload()

        }
    }
}


