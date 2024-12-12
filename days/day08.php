<h1>Battery twins</h1>

<section class="story">

<img src="graphics/canva08.jpg" class="main" title="I whish this was not Dalle/ChatGPT generated. If you can do figures and want wo work with us, drop us a mail.">


<p>Helmi climbed into Santa’s sleigh, tools in hand, and pried open the panel housing the onboard electronics. The batteries sat snugly in their compartments, but a quick voltage check made Helmi’s heart sink. “These won’t last a full Christmas Eve,” they muttered. Worse, the charging electronics were woefully inefficient, wasting precious energy. A digital twin—a real-time simulation model of the battery system—could solve this, but the energy cost of running one digitally would only drain the batteries faster.

<p>Instead, Helmi returned to the workbench and began from first principles. Using ordinary differential equations to model the battery’s behavior, they designed an analog processor to compute the system dynamics directly. The result: a sleek, efficient device that adjusted charging rates on the fly, extending the battery life cycle and speeding up recharges without compromising capacity. By evening, the sleigh’s systems hummed with new vitality. Helmi leaned back with a satisfied grin. “Ready for takeoff,” they said, patting the sleigh’s dashboard. “Efficient, reliable, and just in time for Christmas.”

</section>

<section class="challenge">

<p>Charging batteries may seem straightforward, but as always, the devil is in the details. Let’s test your knowledge: How well do you know the typical charging profile of a modern portable device? Use your finger, mouse, or pencil to draw your best guess on the chart below.</p>

<form>
<?php

$target_filename = "day08_" . $token . ".png";
$target_directory = "../user_data";
if(!preg_match('/^[a-zA-Z0-9._]+$/', $target_filename)) die("Illegal token");
$user_filename = "$target_directory/$target_filename";

if ($token && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['charge_profile'])) {
    move_uploaded_file($_FILES['charge_profile']['tmp_name'], $user_filename);
}

if(!file_exists($user_filename) || !$token) {

?>
<noscript>This form requires javascript to be enabled</noscript>

<p><canvas id="charge_profile" style="position:relative;"
    width="600" height="400">

<p id="submit_area">
<?php if($token) { ?>
    <input type="button" value="Save Image and Hand in" class="primary" id="save_submit">
    <input type="button" value="Clear Image" class="secondary" id="clear">
<?php } else { ?>
    <p class="info">Please <a href='?user'>register first</a>, then you can hand in.</p>
<?php } ?>
</p>

<script type="text/javascript">
async function prefillCanvas(canvas, imageUrl) {
    const ctx = canvas.getContext("2d");

    try {
        const response = await fetch(imageUrl); // Fetch the image from the given URL
        if (!response.ok) {
            throw new Error(`Failed to fetch image: ${response.status}`);
        }

        const blob = await response.blob(); // Convert the response to a Blob
        const img = new Image(); // Create a new Image object

        img.onload = function () {
            // Ensure canvas matches the image dimensions
            canvas.width = img.width;
            canvas.height = img.height;
            ctx.drawImage(img, 0, 0); // Draw the image onto the canvas
        };

        img.onerror = function () {
            throw new Error("Failed to load image");
        };

        img.src = URL.createObjectURL(blob); // Create an object URL for the blob
    } catch (error) {
        console.error("Error prefilling canvas:", error);
    }
}


    ready(function(){ // ready from anachrist.js

        // create canvas element and append it to document body
        var canvas = document.getElementById('charge_profile');

        //canvas.style.position = 'fixed';

        var ctx = canvas.getContext('2d');

        // last known position
        var pos = { x: 0, y: 0 };
        document.addEventListener('mousemove', draw);
        document.addEventListener('mousedown', setPosition);
        document.addEventListener('mouseenter', setPosition);
        
        document.getElementById('save_submit').addEventListener('click', save_submit);
        document.getElementById('clear').addEventListener('click', erase);
        
        erase(); // prepare

        // new position from mouse event
        function setPosition(e) {
            var rect = canvas.getBoundingClientRect();
            pos.x = e.clientX - rect.left,
            pos.y = e.clientY - rect.top
            //pos.x = e.clientX - (canvas.offsetLeft - window.pageXOffset);
            //pos.y = e.clientY - (canvas.offsetTop - window.pageYOffset);
        }
        
        async function erase(e) {
            ctx.fillStyle = "white";
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            prefillCanvas(canvas, "graphics/day07_grid.png");
        }

        function draw(e) {
            // mouse left button must be pressed
            if (e.buttons !== 1) return;

            ctx.beginPath(); // begin

            ctx.lineWidth = 1;
            ctx.lineCap = 'round';
            ctx.strokeStyle = '#000000';

            ctx.moveTo(pos.x, pos.y); // from
            setPosition(e);
            ctx.lineTo(pos.x, pos.y); // to

            ctx.stroke();
        }
        
        function save_submit(e) {
            canvas.toBlob(async function(blob) {
                const submitArea = document.getElementById("submit_area");
                submitArea.innerHTML = "Uploading...";

                try {
                    const formData = new FormData();
                    formData.append("charge_profile", blob);

                    const response = await fetch(location.href, {
                        method: "POST",
                        body: formData,
                    });

                    if (response.ok) {
                        const text = await response.text();
                        const parser = new DOMParser();
                        const fetchedDocument = parser.parseFromString(text, "text/html");
                        const newForm = fetchedDocument.querySelector("form");

                        const currentForm = document.querySelector("form")
                        currentForm.replaceWith(newForm)
                    } else {
                        throw new Error(`Upload failed with status: ${response.status}`);
                    }
                } catch (error) {
                    submitArea.innerHTML = "An error occurred during upload. Please try again.";
                    console.error("Error uploading file:", error);
                }
            }, "image/png");
        }
    });
</script>

<?php

} else { // user submission exists
    $mime_type = mime_content_type($user_filename);
    $data = base64_encode(file_get_contents($user_filename));
    $user_file_src = "data:$mime_type;base64,$data";
    
    ?>
    
    <p class='info'>Thank you for your submission as <strong><?php echo $token; ?></strong>.
      Here is the picture you have drawn (on the left):</p>

    <p>
        <img src='<?php echo $user_file_src; ?>'>
        <img src="https://imperialsociety.in/wp-content/uploads/2022/02/WhatsApp-Image-2022-01-19-at-3.39.03-PM-e1642672790384-768x472.jpeg"
          style="height:400px">
    </p>
    
    <p>On the right, you see how the charge curve looks in reality. Compare your
    black line with the dashed one in the right figure. You see that roughly
    until 80% the power circuit ensures a constant increase in capacity while the
    the remaining percentages go very slow.
    

    
    <?php
    
}

?>
</form>

</section>

