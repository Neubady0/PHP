const form = document.querySelector("#buscador");
const div  = document.querySelector("#resultado");
form.addEventListener("submit", async (e) => {
  e.preventDefault();
  const nombre = e.target[0].value.toLowerCase();
  try {
    const res = await fetch(`https://pokeapi.co/api/v2/pokemon/${nombre}`);
    if (!res.ok) throw new Error("No existe ese Pokémon");
    const data = await res.json();
    div.innerHTML = `<h3>${data.name}</h3><img src="${data.sprites.front_default}" />`;
  } catch (err) {
    div.textContent = err.message;
  }
});