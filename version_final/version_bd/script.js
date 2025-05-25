document.getElementById('buscar').addEventListener('submit', async e => {
    e.preventDefault();
    const nombre = document.getElementById('nombre').value.trim().toLowerCase();
    const caja   = document.getElementById('resultado');
    if (!nombre) return;
    caja.textContent = 'Cargando...';
    try {
      const res = await fetch(`https://pokeapi.co/api/v2/pokemon/${nombre}`);
      if(!res.ok) throw new Error('No encontrado');
      const data = await res.json();
      caja.innerHTML = `
        <h3>${data.name.toUpperCase()}</h3>
        <img src="${data.sprites.front_default}" alt="${data.name}">
        <p>Peso: ${data.weight}</p>
        <p>Altura: ${data.height}</p>`;
    } catch (err) {
      caja.textContent = '¡Error: ' + err.message + '!';
    }
  });
  