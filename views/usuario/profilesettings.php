<?php 
$estilos = [ 'profile','form', 'profilesettings' ];
foreach ($estilos as $estilo) :  ?>
    <link rel="stylesheet" href="<?= $_ENV['BASE_URL'] ?>css/<?= $estilo ?>.css">
<?php
endforeach;
require_once '../views/layout/header.php';
use Controllers\UsuarioController;

$usuarioC = new UsuarioController;
$userdata = $usuarioC->obtenerUsuario($_SESSION['identity']->email);

?>


<?php foreach($_SESSION['scripts'] as $script): ?>
        <script type="module" src="<?= $_ENV['BASE_URL']?>js/<?= $script ?>.js" defer></script>
<?php endforeach; ?>
    <main class="psmain">
        <script src="<?= $_ENV['BASE_URL']?>js/psmain.js"></script>
        <aside class="profile-settings-menu">
            <h3>SETTINGS</h3>
            <ul>
                <li>
            <a class="transition profsetlink">
                        <img class="link-icon" src="<?= $_ENV['BASE_URL']?>img/icons/profile.svg" alt="profile.svg">
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a class="transition profsetlink">
                        <img class="link-icon" src="<?= $_ENV['BASE_URL']?>img/icons/earnings.svg" alt="earnings.svg">
                        <span>Earnings</span>
                    </a>
                </li>
                <li>
                    <a class="transition profsetlink">
                        <img class="link-icon" src="<?= $_ENV['BASE_URL']?>img/icons/model.svg" alt="model.svg">
                        <span>Be a creator</span>
                    </a>
                </li>

                <li>
                    <a class="transition profsetlink">
                        <img class="link-icon" src="<?= $_ENV['BASE_URL']?>img/icons/shield.svg" alt="shield.svg">
                        <span>Account Support</span>
                    </a>
                </li>
            </ul>
        </aside>
        <section class="profile-settings-content">
            <article class="profsetsection" id="psprofile">
                <h1>Profile</h1>
                <a href="<?= $_ENV['BASE_URL']?>profile">
                    <button class="defaultbtn submit transition boxshadow viewprofbtn">View Profile</button>
                </a>
                <form class="container psprofile-form" action="../userprofile/update">
                    <div class="inputcontainer psform-input-cont">
                        <label for="name">Name</label>
                        <input id="name" type="text" value="<?php echo($userdata->nombre); ?>">
                    </div>
                    <div class="inputcontainer psform-input-cont">
                        <label for="bio">Bio</label>
                        <textarea id="bio" type="text" rows="8"> <?php echo($userdata->descripcion)?></textarea>
                    </div>
                    <div class="banner-img-container">
                        <div class="ps-prof-img">
                            <label for="profs-img">Profile Image</label>
                            <input type="file" name="profs-img" id="input-ps-img" hidden>
                            <img src="<?= $_ENV['BASE_URL'] ?>img/user/profilephoto/<?= $userdata->foto_perfil;?>" width="100px" alt="profile.jpg" class="ps-img">
                            <img src="<?= $_ENV['BASE_URL']?>img/banner/pencil.png" alt="pencil" width="100px" class="ps-img pencil-img none transition" id="pencil1">
                        </div>
                        <div class="ps-prof-banner">
                            <label for="profs-banner">Banner Image</label>
                            <input type="file" name="profs-banner" id="input-ps-banner" hidden>
                            <img src="<?= $_ENV['BASE_URL']?>img/banner/banner.jpg" width="150px" alt="profile.jpg" class="ps-img">
                            <img src="<?= $_ENV['BASE_URL']?>img/banner/pencil.png" alt="pencil" width="100px" class="ps-img pencil-img none transition" id="pencil2">
                        </div>
                    </div>
                    <div class="inputcontainer psform-input-cont">
                        <label for="email">Correo Electrónico</label>
                        <input id="email" type="text" value="<?php echo($userdata->email)?>" readonly>
                    </div>
                    <input type="submit" class="    submit transition boxshadow" id="psform-edit" value="SAVE CHANGES">
                </form>
            </article>
            <article class="profsetsection none" id="psearnings">
                <h1>Earnings</h1>
                <span>You Have Already Earn:</span>
                <div class="model--price textshadowlight">
                    <span class="price--bnumber">19</span><span class="price-snumber">,95€</span>
                </div>
                <span>If you have any question about your earnings check out our <a class=" profsetlink linkpurple"  style="cursor:pointer; color:var(--contact-input-color); width: 10px; display:inline-block">FAQs</a></span>
            </article>
            <article class="profsetsection none" id="psbecreator">
                <p>If you wanna be a creator, before you must to fill the <a href="<?= $_ENV['BASE_URL']?>profile/becreator" class="linkpurple">creator form</a>. Then, we will decide if you are mercedor to be one of us!</p>
                <div class="profile-creator-div pscreator-btn">
                    <button class="profile-creator-button transition textshadow boxshadow defaultbtn" onclick="location.href ='<?= $_ENV['BASE_URL']?>profile/becreator'">
                        Be Creator 
                        <img class="model-creator-svg" src="<?= $_ENV['BASE_URL']?>img/icons/cube.svg" alt="model">
                    </button>
                </div>
            </article>
            <article class="profsetsection none" id="psaccsupport">
                <div class="faq">
                    <div class="faq-question linkpurple transition">
                        <span>Why my money didn't arrive?</span>
                        <img src="<?= $_ENV['BASE_URL']?>img/icons/down-arrow.svg" alt="down_arrow">
                    </div>
                    <div class="faq-answer">
                        Usually, paypal transactions are instantaneous, but there are times that can take a couple of days if there is a lot of traffic, otherwise <a href="<?= $_ENV['BASE_URL']?>contact" class="linkpurple">contact us</a>
                    </div>
                </div>
                <div class="faq">
                    <div class="faq-question linkpurple transition">
                        <span>Why was my application to be a creator rejected?</span>
                        <img src="<?= $_ENV['BASE_URL']?>img/icons/down-arrow.svg" alt="down_arrow">
                    </div>
                    <div class="faq-answer">
                        If the administrators have rejected your request, the possible reasons are:
                        <ul>
                            <li>- That the 3D model is obscene or inappropriate</li>
                            <li>- That the description of the profile is invalid (that it does not contain an adequate description. Example: "aasrm")</li>
                            <li>- That the paypal email is invalid</li>
                        </ul>
                        If you think it was a mistake, please <a href="<?= $_ENV['BASE_URL']?>contact" class="linkpurple">contact us</a>.
                    </div>
                </div>
                <div class="faq">
                    <div class="faq-question linkpurple transition">
                        <span>Do i have to pay to be a creator?</span>
                        <img src="<?= $_ENV['BASE_URL']?>img/icons/down-arrow.svg" alt="down_arrow">
                    </div>
                    <div class="faq-answer">
                        No, you just have to send us a request by filling out <a href="<?= $_ENV['BASE_URL']?>profile/becreator" class="linkpurple">this form</a>, also if you become a creator you can enjoy exclusive discounts
                    </div>
                </div>
                <div class="faq">
                    <div class="faq-question linkpurple transition">
                        <span>How does the sales system work?</span>
                        <img src="<?= $_ENV['BASE_URL']?>img/icons/down-arrow.svg" alt="down_arrow">
                    </div>
                    <div class="faq-answer">
                        It is very simple, if you are a creator you will upload a model with a price. Every time a user buys that model, the creator will take a large percentage of the cost of the sale. As simple as that!
                    </div>
                </div>
            </article>
        </section>
    </main>
