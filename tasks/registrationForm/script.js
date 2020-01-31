function check()
{
    var check = document.getElementById('check');
    if(check.checked == true)
    {
        document.getElementById('other').style.display = "block";
        alert("checked");
    }
    else
    {
        document.getElementById('other').style.display = "none";
    }
}