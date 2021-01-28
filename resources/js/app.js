const axios = require("axios");

window.SubmitForm = formAttributes => {
    for (formAttribute of formAttributes)
        document.getElementById(
            `hidden-${formAttribute}-input`
        ).value = document.getElementById(formAttribute).innerHTML;
};

// window.SubmitForm = function (array) {
//     array.foreach bla bla
// }

window.showSelect = function() {
    current_topic = document.getElementById("current_topic");
    topic = document.getElementById("topic");
    topic.removeAttribute("hidden");
    current_topic.setAttribute("hidden", true);
};

document.getElementById("topicSelect").onchange = function(e) {
    // console.log("Hello");
    const topic_id = e.target.value;

    axios
        .get("posts/topic", {
            params: {
                topic_id
            }
        })
        .then(function(response) {
            console.log(response);
            document.getElementById("contentWrapper").innerHTML = response.data;
        })
        .catch(function(error) {
            console.log(error);
        })
        .then(function() {
            // always executed
        });
};
