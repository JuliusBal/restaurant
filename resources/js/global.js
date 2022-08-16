function newElement() {
    if (document.getElementById("guestInput").value === '') {
        alert("Please enter your guest details");
    } else {

        var inputVal = document.getElementById("guestInput").value;

        const htmlBlock = document.createElement("div");
        htmlBlock.innerHTML = `
                <div class="form-group">
                    <input type="text" name="guests[]" value="${inputVal}">
                    <button class="close" type="button">Remove</a>
                 <div>
                `;
        document.getElementById("guests").appendChild(htmlBlock);
    }
    document.getElementById("guestInput").value = "";

    for (i = 0; i < close.length; i++) {
        close[i].onclick = function () {
            var div = this.parentElement;
            div.remove();
        }
    }
}

var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
    close[i].onclick = function () {
        var div = this.parentElement;
        div.remove();
    }
}
