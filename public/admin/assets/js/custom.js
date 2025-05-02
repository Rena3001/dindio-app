window.addEventListener("load", function () {
    const element = document.querySelector("[autoclick]");
    if (element) {
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(element);
        toastBootstrap.show();
    }

    const themeControlToggle = this.document.querySelectorAll(
        ".theme-control-toggle label"
    );
    const html = this.document.querySelector("html");
    const logoImg = this.document.querySelector(".logo_img");
    const pathLogo = logoImg.getAttribute("src");
    let newPath = "";
    let theme = html.dataset.bsTheme;
    if (!theme) {
        theme = "light";
    }
    if (theme == "light") {
        newPath = pathLogo.replace("dark", "light");
    } else {
        newPath = pathLogo.replace("light", "dark");
    }

    if (logoImg) {
        logoImg.setAttribute("src", newPath);
    }

    if (themeControlToggle.length > 0 && html) {
        themeControlToggle.forEach((item, index, array) => {
            item.addEventListener("click", function (e) {
                const logoPath = logoImg.getAttribute("src");
                let theme = html.dataset.bsTheme;
                if (!theme) {
                    theme = "light";
                }
                if (theme == "light") {
                    newPath = logoPath.replace("light", "dark");
                } else {
                    newPath = logoPath.replace("dark", "light");
                }

                logoImg.setAttribute("src", newPath);
            });
        });
    }
});
