<?PHP
function error_without_field($message)
{
    return '<script>
                document.getElementById("error").innerHTML = "'.$message.'";
                document.getElementById("error-message").style.display = "block";
            </script>';
}
?>