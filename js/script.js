
//abrir treino seg usuario 
var button = document.getElementById("esconder-mostrar")



button.addEventListener("click", function () {

    var container = document.getElementById("container")

    if (container.style.display === "none") {
        container.style.display = "block"
    } else {
        container.style.display = "none"
    }

})

//abrir treino ter usuario
var button1 = document.getElementById("esconder-mostrar1")



button1.addEventListener("click", function () {

    var container1 = document.getElementById("container1")

    if (container1.style.display === "none") {
        container1.style.display = "block"
    } else {
        container1.style.display = "none"
    }
})
//abrir treino qua usuario
var button1 = document.getElementById("esconder-mostrar2")



button1.addEventListener("click", function () {

    var container1 = document.getElementById("container2")

    if (container1.style.display === "none") {
        container1.style.display = "block"
    } else {
        container1.style.display = "none"
    }
})
//abrir treino qui usuario
var button1 = document.getElementById("esconder-mostrar3")



button1.addEventListener("click", function () {

    var container1 = document.getElementById("container3")

    if (container1.style.display === "none") {
        container1.style.display = "block"
    } else {
        container1.style.display = "none"
    }
})
//abrir treino sex usuario
var button1 = document.getElementById("esconder-mostrar4")



button1.addEventListener("click", function () {

    var container1 = document.getElementById("container4")

    if (container1.style.display === "none") {
        container1.style.display = "block"
    } else {
        container1.style.display = "none"
    }
})
//abrir treino sab usuario
var button1 = document.getElementById("esconder-mostrar5")



button1.addEventListener("click", function () {

    var container1 = document.getElementById("container5")

    if (container1.style.display === "none") {
        container1.style.display = "block"
    } else {
        container1.style.display = "none"
    }
})

//adicionar mais campos no cadastro de treino
var controleCampo = 1;
var num = 1;
function adicionarCampo() {
    controleCampo++
    console.log(controleCampo)

    document.getElementById('infos').insertAdjacentHTML('beforeend', '<div class="opcoes"> <div id="campo' + controleCampo + '"><div id="treino"><div id="exercicio"><label>Exercício:</label><br><input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="exercicio[]" id="exercicio" type="text" placeholder=""></div><br> <div id="series"><label>Séries:</label><br><input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="series[]" id="series" type="text" placeholder=""></div><br><div id="repeticoes"><label>Repetições:</label><br><input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="repeticoes[]" id="repeticoes" type="text" placeholder=""></div><br><div id="obs"><label>Observação:</label><br><input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="obs[]" id="obs" type="text" placeholder=""></div><br><button class="btn btn-primary" type="button" onclick="adicionarCampo()">+ Exercício</button><br><br></div></div>')
}
