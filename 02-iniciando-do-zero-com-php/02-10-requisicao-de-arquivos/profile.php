<article style="
 padding:5px 20px;
 background-color:#eee;
 border-radius:4px">
  <h1> <?= $profile->name; ?> </h1>
  <p> Trabalha na <?= $profile->company; ?>
    <br>
    <a title="enviar email" href="mailto:<?= $profile->email; ?>"> enviar email </a>
</article>