<table>
    <tr valign="top">
        <th class="metabox_label_column">
            <label for="meta-a">Текстове поле</label>
        </th>
        <td>
            <input type="text" id="meta-a" name="meta-a" value="<?php echo @get_post_meta($post->ID, 'meta-text', true); ?>" />
        </td>
    </tr>
    <tr valign="top">
        <th class="metabox_label_column">
            <label for="meta-b">Мультиселект</label>
        </th>
        <td>
            <select id="meta-b" name="meta-select" multiple >
                <option value="1">Австрія</option>
                <option value="2">Бельгія</option>
                <option value="3">Велика Британія</option>
                <option value="4">Греція</option>
                <option value="5">Данія</option>
                <option value="6">Іспанія</option>
            </select>
        </td>
    </tr>
    <tr valign="top">
        <th class="metabox_label_column">
            <label for="meta-c">Завантаження малюнка</label>
        </th>
        <td>
            <input type="file" id="meta-c" name="meta-img" accept="image/*" value="<?php echo @get_post_meta($post->ID, 'meta-add-img', true); ?>" />
        </td>
    </tr>
</table>
