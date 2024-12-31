<div
    x-data="{
        groupItems: [],
        init() {
            $el.querySelectorAll('input[type=checkbox]').forEach(el => {
                console.log(el)
            });
        }
    }"
    x-modelable="groupItems"
    {{ $attributes }}
>
    {{ $slot }}
</div>
