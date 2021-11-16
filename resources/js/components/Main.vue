<template>
    <div class="d-flex flex-column justify-content-center text-center container">
        <h3>Перший раз у нас?</h3>
        <h4><a href="/createPlace">Створіть ваш заклад</a> та <a href="/signIn">створіть акаунт</a></h4>
        <h3 class="mt-5">Вже є аканут?</h3>
        <h4><a href="/signUp">Увійдіть до акануту</a></h4>
    </div>
</template>

<script>
export default {
    name: "Main"
}
</script>

<style scoped>
    .container {
        margin-top: 10em;
        padding: 40px 0 40px 0;
        border-radius: 7px;
        border: 2px solid #ca84dc;
        box-shadow: 5px 5px 0 0 #ca84dc;
    }

    a {
        text-decoration: none;
        font-style: italic;
    }
</style>
