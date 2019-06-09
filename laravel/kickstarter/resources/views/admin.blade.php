@extends('layout')
@section('pagecontent')
<div class="m-table">
  <button id="menu" onclick="myMenu()" class="m-mobile__nav">
    <i class="fas fa-bars"></i>
  </button>
  <div id="table" onclick="myTables()" class="m-nav">
      <a class="a-tables" href="/admin/users">Gebruiker</a>
      <a class="a-tables" href="/admin/projects">Projecten</a>
      <a class="a-tables" href="/admin/images">Afbeeldingen</a>
      <a class="a-tables" href="/admin/news">Nieuws</a>
      <a class="a-tables" href="/admin/categorie">Categorie</a>
      <a class="a-tables" href="/admin/donation">Donaties</a>
      <a class="a-tables" href="/admin/pages">pagina's</a>
      <a class="a-tables" href="/admin/reaction">Reacties</a>
  </div>
</div>

<script>
  function myMenu(){
    let menu = document.getElementById('menu');
    let table = document.getElementById('table');
    console.log('test');
    if(menu.style.display = 'block'){
      menu.style.display ='none';
      table.style.display = 'block';
    }
    else {
      menu.style.display = "block";
      table.style.display = 'none';
    }
  }

  function myTables(){
    let menu = document.getElementById('menu');
    let table = document.getElementById('table');
    if(table.style.display = 'block'){
      table.style.display ='none';
      menu.style.display = 'block';
    }
    else {
      table.style.display = "block";
      menu.style.display = 'none';
    }

  }
</script>