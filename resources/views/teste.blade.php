
@extends('layouts.app')

@section('content')

<html>
<head>
<title>Calculadora básica de soma</title>
<style>
    #bloco {
        width: 200px;
        height: 200px;
        background-color: black;
    }
</style>
</head>

<body>
    <form id="f_calc">
        <label>Valor 1</label>
        <input type="text" id="f_v1" value="0"/><br/><br/>
        <label>Valor 2</label>
        <input type="text" id="f_v2" value="0"/><br/><br/>
        <label>Resultado</label>
        <input type="text" id="result" value="0"><br><br>
        <input type="button" id="btSomaJS" value="SOMAR JS"/>
        <input type="button" id="btSomaJQ" value="SOMAR JQ"/>
    </form>
<div id="bloco"></div>
<p id="texto"></p>

<label>Seu nome</label>
<input type="text" id='nome'>
<h1 id="ver"></h1>

</body>
</html>

<script>

    $('#bloco').click(()=>{
        $('#texto').text('Clicou')
    })

    $('#bloco').mouseenter(()=>{
        $('#texto').text('Em cima')
    })

    $('#bloco').mouseleave(()=>{
        $('#texto').text('Saiu')
    })

    $('#nome').keyup(function () {
        $('#ver').text($('#nome').val())
    });


</script>

<script>

    document.addEventListener("load",function(){
        document.getElementById("btSomaJS").addEventListener("click",function(){
            var v1=document.getElementById("f_v1").value;
            var v2=document.getElementById("f_v2").value;
            var soma=parseInt(v1)+parseInt(v2);
            document.getElementById("result").innerHTML=soma;
         });
    });
</script>
<script>

    $("#btSomaJQ").click(()=>{
        let v1=parseInt($("#f_v1").val())
        let v2=parseInt($("#f_v2").val())
        let soma=v1+v2
        $("#result").val(soma)
        }
    )

</script>

@endsection
