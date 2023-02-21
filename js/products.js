
window.addEventListener('load', function () {
      accessoryCheckboxes = ["accessories", "devices", "furniture", "music-instruments", "toys", "animal-foods", "plants"];
      for (let i = 1; i <= 7; i++) {
            const checkbox = document.getElementById(accessoryCheckboxes[i - 1]);
            const div = document.getElementById("preference" + i);
            div.style.backgroundColor = 'whitesmoke';
            checkbox.addEventListener('click', function () {
                  if (div.style.backgroundColor == 'whitesmoke') div.style.backgroundColor = 'gray';
                  else div.style.backgroundColor = 'whitesmoke';
            });
      }
});
