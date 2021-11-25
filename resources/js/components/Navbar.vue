<template>
    <header>
        <nav class="py-2 border-bottom">
            <div class="container">
                <ul class="nav col-12 mb-2 text-center justify-content-center mb-md-0">
                    <li class="nav-item"><a href="/analytics/general" class="nav-link link-dark px-2 active" aria-current="page">{{ $t("navbar.analytics") }}</a></li>
                    <li class="nav-item"><a href="/clients" class="nav-link link-dark px-2">{{ $t("navbar.clients") }}</a></li>
                    <li class="nav-item"><a href="/workers" class="nav-link link-dark px-2">{{ $t("navbar.workers") }}</a></li>
<!--                    <li><a type="button" href="/signIn" class="nav-link active">Регістрація</a></li>
                    <li><a type="button" href="/signUp" class="btn btn-primary me-2">Увійти</a></li>-->
                    <li class="nav-item"><a href="/logOut" class="btn btn-primary me-2">{{ $t("navbar.exit") }}</a></li>
                    <li>
                        <div class="locale-changer">
                            <a href="#" @click="setLocale('ua')">ua</a>
                            <a href="#" @click="setLocale('en')">en</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: "Navbar",
    methods: {
        setLocale: function (locale) {
            localStorage.setItem('locale', locale);
            window.location.reload();
        }
    }
    /*watch: {
        lang() {
            $root.changeLocale($i18n.locale);
        }
    }*/
}
</script>

<style scoped>
    .nav-item {
        margin: 0 10px 0 10px;
    }
    nav{
        background-color: #e8ecff;
    }
    .button {
        margin-left: 50px;
    }
    ul li a{
        font-family: 'Montserrat', sans-serif;
        font-size: 24px;
        margin-left: 25px;
    }
    ul li a:hover{
        text-decoration: underline;
        color:blue;
    }
    .btn{
        width: 130px;
        border-radius: 30px;
    }
    .btn:hover{
        width: 130px;
        color:#fff;
        border-radius: 30px;
    }
</style>
