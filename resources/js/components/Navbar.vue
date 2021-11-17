<template>
    <header>
        <nav class="py-2 bg-light border-bottom">
            <div class="container">
                <ul class="nav col-12 mb-2 text-center justify-content-center mb-md-0">
                    <li class="nav-item"><a href="/analytics" class="nav-link link-dark px-2 active" aria-current="page">Аналітика</a></li>
                    <li class="nav-item"><a href="/clients" class="nav-link link-dark px-2">Клієнти</a></li>
<!--                    <li><a type="button" href="/signIn" class="nav-link active">Регістрація</a></li>
                    <li><a type="button" href="/signUp" class="btn btn-primary me-2">Увійти</a></li>-->
                    <li class="nav-item"><a href="/logOut" class="btn btn-primary me-2">Вийти</a></li>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: "Navbar"
}
</script>

<style scoped>
    .nav-item {
        margin: 0 10px 0 10px;
    }

    .button {
        margin-left: 50px;
    }

</style>
