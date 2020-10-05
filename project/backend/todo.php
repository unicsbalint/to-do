<?php if(!IsUserLoggedIn()) : ?>
    <h1>Page access is forbidden!</h1>
<?php else: ?>   
    <form>
        <input type="text" class="to-do-input" placeholder="What should I do?">
        <button class="to-do-button" type="submit">Do it!</button>
    </form>

    <div class="to-do-container">
        <ul class="to-do-list">
            
        </ul>
    </div>
    <div class="nyomtatas">        
        <button  onclick="printContent()">Print my to-do</button>
    </div>
    <script src="project/frontend/script.js"></script>
<?php endif; ?>