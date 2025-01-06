@use('Bearly\Ui\Size')

@aware(['radius' => Size::BASE])

<th {{ $attributes->class([
    'font-semibold px-4 py-2 text-left text-gray-700 dark:text-gray-300',
    'bg-gray-200/50 dark:bg-gray-700/70 backdrop-blur',
    'rounded-none' => Size::NONE->is($radius),
    'first:rounded-tl last:rounded-tr' => Size::BASE->is($radius),
    'first:rounded-tl-lg last:rounded-tr-lg' => Size::LG->is($radius),
    'first:rounded-tl-xl last:rounded-tr-xl' => Size::XL->is($radius),
]) }}>
    {{ $slot }}
</th>
