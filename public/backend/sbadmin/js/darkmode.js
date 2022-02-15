      const btn = document.querySelector('#switch-theme');
      const theme = localStorage.getItem('theme');


      const enableDarkMode = () => {
         document.documentElement.setAttribute('data-theme','dark');
          localStorage.setItem('theme','dark');
           // btn.innerHTML = "Turn off dark mode";
           document.getElementById("switch-theme").checked = true;
      }

      const disableDarkMode = () => {
          document.documentElement.removeAttribute('data-theme');
          localStorage.setItem('theme','light');
          // btn.innerHTML = "Turn on dark mode";
          document.getElementById("switch-theme").checked = false;
      }

      if (theme === 'dark') {
        enableDarkMode();
    }


    btn.addEventListener('click', () => {
      let theme = localStorage.getItem('theme');
      if(theme !== "dark")
      {
        enableDarkMode();
      }
      else
      {
        disableDarkMode();
      }
    });