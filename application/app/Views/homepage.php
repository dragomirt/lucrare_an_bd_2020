<?php echo view('templates/header', ['title' => "Lama Exchange — Schimb de apartamente"]); ?>
<div class="homepage">
    <div class="container">
        <div class="jumboHeader">
            <img src="/images/llama.svg" alt="Llama">
            <h1>Lama Exchange</h1>
            <h2>Serviciu schimb apartamente</h2>
            <h3>Oferim cele mai convinabile oferte și cele mai comfortabile locații!</h3>
        </div>
    </div>
    <img class="exchangeImage" src="/images/exchange.jpg" alt="Exchange Process">

    <div class="container">
        <div class="contact">
            <h2>Contact</h2>
            <?php if (isset($contactResponse)): ?>
                <p><?php echo $contactResponse; ?></p>
            <?php endif;?>
            <form action="/contact" method="POST" class="contactForm">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName">

                <label for="lastName">Last Name</label>
                <input type="text" name="lastName">

                <label for="email">Email</label>
                <input type="email" name="email">

                <label for="phone">Phone</label>
                <input type="text" name="phone">

                <label for="message">Message</label>
                <textarea name="message" id="message" cols="30" rows="10"></textarea>

                <button>Submit</button>
            </form>
        </div>
    </div>
</div>
<?php echo view('templates/footer'); ?>