<?php include 'views/header.php'; ?>

<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <h1>Connexion Gestionnaire</h1>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Nom d'utilisateur" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
</div>

<?php include 'views/footer.php'; ?>
