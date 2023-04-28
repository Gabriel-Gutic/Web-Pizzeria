function OnDelete(id)
{
    let deletedItem = document.getElementById("deleted-item");
    deletedItem.innerHTML = id;

    $("#deleteModal").modal('show');
}

function OnDeleteConfirmed()
{
    let id = document.getElementById("deleted-item").innerHTML;

    let parts = id.split("-");
    
    window.location.href = "/Project1-Pizzeria/delete.php?" + parts[1] + "=" + parts[2];
}