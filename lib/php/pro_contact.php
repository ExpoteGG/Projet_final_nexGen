<?php
// traitement du formulaire
if (isset($_GET['submit'])) {
    extract($_GET, EXTR_OVERWRITE);

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $erreur = "Veuillez remplir tous les champs";
    } else {
        $contact = new ContactDB($cnx);
        $contact->addContact($_GET);
    }
}
?>

<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Contact us <small>Feel free to contact us</small></h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_contact">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                    </span>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                            </div>
                            <div class="form-group">
                                <label for="subject">
                                    Subject</label>
                                <select id="subject" name="subject" class="form-control" required="required">
                                    <option value="na" selected="">Choose One:</option>
                                    <option value="service">Service client</option>
                                    <option value="suggestions">Suggestions</option>
                                    <option value="product">Concernant nos chambre</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Message</label>
                                <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                          placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            
                            <button type="submit" class="btn btn-primary pull-left" id="submit" name="submit">
                                Send Message</button>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
                <legend>Our office</legend>
                <address>
                    <strong>Hôtel O Secret •</strong><br>
                    Rue de Chaudfontaine 23,<br> 
                    B-4020 Liège<br>
                    <abbr title="Phone">
                        P:</abbr>
                    +32 496.85.85.85
                </address>
                <address>
                    <strong>Full Name</strong><br>
                    <a href="mailto:#">first.last@example.com</a>
                </address>
            </form>
        </div>
    </div>
</div>