# Form Inputs

Big forms, little forms, wide forms, thin forms. And they all need inputs. These are those inputs.

The inputs are built as blade components that should work with regular Laravel forms **and** with Livewire -- just like real inputs. In fact, most of them are real inputs under the hood!

## Labels
Simple labels. They're just `<label>` elements with some extra sugar. They attempt
to be smart about validation errors and have some extra classes applied to them.

```html +demo
<x-ui::label>Example Label</x-ui::label>
```

## Text Inputs

Simple text inputs, supercharged with a sprinkling of blade. They try to be smart about
validation errors and setting the value to any `old()` input if necessary. Inputs can
be used with or without a label. They are meant to be smart yet, atomic and flexible.

```html +demo
<x-ui::input placeholder="Example Input" />
```

Attributes are forwarded to the underlying `<input>` element, so you can do this kind of stuff, too:

```html
<x-ui::input placeholder="Example Input" class="w-full" />
```

## Textareas

Like inputs, but bigger. They're also smart about validation errors and `old()` values.

```html +demo
<x-ui::textarea placeholder="Example Textarea" />
```

## Checkboxes

Simple, minimal checkboxes. Seemingly simple, but we've handled some of the annoying logic for you.
For example, imagine a checkbox is bound to a database property (without Livewire), but you uncheck it and encounter a validation error.
With a normal HTML checkbox, the `old` input will be `null`, and the checkbox will still be checked.
The checkbox component handles this case and properly looks at the old input to determine if it should be checked or not
(this only applies when you're not using Livewire).

Pair them with a label for best results.

```html +demo
<x-ui::label>
    <x-ui::checkbox name="example" label="Example Checkbox" /> Hello!
</x-ui::label>
```

## Radio Buttons

Similar to checkboxes, but there can be only one.

```html +demo previewClasses={space-y-4}
<x-ui::label>
    <x-ui::radio name="example" label="Example Radio" value="1" /> Chosen 1
</x-ui::label>
<x-ui::label>
    <x-ui::radio name="example" label="Example Radio" value="2" /> Chosen 2
</x-ui::label>
```

## Selects & Options

Selects with a little extra spice, but not too much. Like other inputs, they try
to be smart about validation errors. These have a few props to know about:

```php
[
    'options' => null,
    'placeholder' => null,
    'selected' => old($attributes->get('name', '_'), null),
]
```

The `options` prop allows you to specify an array of options. The keys are the values, and the values are the labels.

```html
<x-ui::select name="example" :options="['one' => 'One', 'two' => 'Two']" />
```

Alternatively, you may specify the options by using the default slot, like this:

```html
<x-ui::select name="choices">
    <option value="one">One</option>
    <option value="two">Two</option>
</x-ui::select>
```

The `placeholder` prop allows you to specify a placeholder option. It will be the first option in the list, and it will be disabled.

The selected option specifies a key to be marked as selected in the select's `<option>` elements.


## Input Groups

Input groups are a way to group a label and an input together, without having to write a bunch of boilerplate.

The simplest way to use an input group is to include the `for` attribute which matches the name of the input.
Usually you'll want to include a label, too. You can do that using the `label` prop _or the label slot_.

```html +demo
<x-ui::input-group for="example" label="Hello, I'm an input group">
    <x-ui::input name="example" />
</x-ui::input-group>
```

Using an input group has the added benefit of automatically applying validation error classes to the label and input.

```html +demo
@php
    $errors->default->add('example', 'This is an example error')
@endphp
<x-ui::input-group for="example" label="Input group with error">
    <x-ui::input name="example" />
</x-ui::input-group>
```

## Validation Errors

Usually with forms you'll want to use input groups, but when you need to display errors elsewhere, use the `<x-ui::input-error>` component.

It takes a single `for` prop which should match the name of the error key.
When an error is present with that key, it will show. The same as Laravel's built-in `@error` directive.


```html +demo
@php
    $errors->default->add('example-error', 'This is a lonely error, with no input group')
@endphp
<x-ui::input-error for="example-error" />
```
