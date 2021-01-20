window.SubmitForm = formAttributes => {
    for (formAttribute of formAttributes)
        document.getElementById(
            `hidden-${formAttribute}-input`
        ).value = document.getElementById(formAttribute).innerHTML;
};

// window.SubmitForm = function (array) {
//     array.foreach bla bla
// }

current_topic = document.getElementById("current_topic");
topic = document.getElementById("topic");

current_topic.addEventListener("click", function() {
    topic.removeAttribute("hidden");
    current_topic.setAttribute("hidden", true);
});
