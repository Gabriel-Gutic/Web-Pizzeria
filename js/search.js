function SearchPizza()
{
    let input = document.getElementById("search-pizza-input");

    let container = document.getElementById("pizza-container");

    for (const child of container.children)
    {
        let names = child.getElementsByClassName("pizza-name");
        if (names.length > 0)
        {
            if (names[0].innerHTML.toLowerCase().includes(input.value.toLowerCase()))
            {
                child.classList.add("visible-card");
                child.classList.remove("hidden-card");
            }
            else
            {
                child.classList.add("hidden-card");
                child.classList.remove("visible-card");
            }
        }
    }
}

function SearchDrink()
{
    let input = document.getElementById("search-drink-input");

    let container = document.getElementById("drink-container");

    for (const child of container.children)
    {
        let names = child.getElementsByClassName("drink-name");
        if (names.length > 0)
        {
            if (names[0].innerHTML.toLowerCase().includes(input.value.toLowerCase()))
            {
                child.classList.add("visible-card");
                child.classList.remove("hidden-card");
            }
            else
            {
                child.classList.add("hidden-card");
                child.classList.remove("visible-card");
            }
        }
    }
}