<?php

return [
    /**
     * Channels.
     */
    'channels.index.title' => 'Каналы',
    'channels.index.create_btn' => 'Создать канал',
    'channels.index.table_row_action_text' => 'Редактировать канал',
    /**
     * Channels show page.
     */
    'channels.show.title' => 'Редактировать канал',
    /**
     * Channels create page.
     */
    'channels.create.title' => 'Создать канал',
    /**
     * Settings layout.
     */
    'layout.menu_btn' => 'Меню настроек',
    /**
     * Staff listing page.
     */
    'staff.index.title' => 'Сотрудники',
    'staff.index.search_placeholder' => 'Поиск сотрудника',
    'staff.index.active_filter' => 'Показать неактивных',
    'staff.index.create_btn' => 'Добавить сотрудника',
    'staff.index.table_row_action_text' => 'Редактировать сотрудника',
    /**
     * Staff show page.
     */
    'staff.show.title' => 'Редактировать сотрудника',
    'staff.show.delete_btn' => 'Деактивировать аккаунт',
    'staff.show.delete_title' => 'Удалить сотрудника',
    'staff.show.restore_title' => 'Восстановить сотрудника',
    /**
     * Staff create page.
     */
    'staff.create.title' => 'Создать сотрудника',
    /**
     * Staff form.
     */
    'staff.form.create_btn' => 'Создать сотрудника',
    'staff.form.update_btn' => 'Обновить сотрудника',
    'staff.form.permissions_heading' => 'Права доступа',
    'staff.form.permissions_description' => 'Управление правами доступа сотрудника.',
    'staff.form.admin_message' => 'Администратор имеет доступ ко всем правам доступа.',
    'staff.form.danger_zone.label' => 'Удалить сотрудника',
    'staff.form.danger_zone.delete_strapline' => 'Удаление сотрудника приведет к запрету доступа к панели управления, вы можете восстановить его позже.',
    'staff.form.danger_zone.restore_strapline' => 'Восстановите аккаунт сотрудника, чтобы он снова получил доступ к панели управления.',
    'staff.form.danger_zone.own_account' => 'Удаление собственного аккаунта приведет к выходу из системы.',

    /**
     * Addons listing page.
     */
    'addons.index.title' => 'Дополнения',
    'addons.index.table_row_action_text' => 'Просмотр',
    /**
     * Addons show page.
     */
    'addons.show.title' => 'Дополнение',
    /*
     * Languages listing page.
     */
    'languages.index.title' => 'Языки',
    'languages.index.create_btn' => 'Создать язык',
    'languages.index.table_row_action_text' => 'Редактировать язык',
    /**
     * Languages create page.
     */
    'languages.create.title' => 'Создать язык',
    /**
     * Languages show page.
     */
    'languages.show.title' => 'Редактировать язык',
    /**
     * Language form.
     */
    'languages.form.create_btn' => 'Создать язык',
    'languages.form.update_btn' => 'Обновить язык',
    'languages.form.default_instructions' => 'Установите, является ли этот язык языком по умолчанию, это заменит текущий язык по умолчанию.',
    /**
     * Currencies table.
     */
    'currencies.index.title' => 'Валюты',
    'currencies.index.table_row_action_text' => 'Редактировать',
    'currencies.index.no_results' => 'В данный момент у вас нет валют в системе.',
    /**
     * Currency show page.
     */
    'currencies.show.title' => 'Редактировать валюту',
    /**
     * Currency create page.
     */
    'currencies.create.title' => 'Создать валюту',
    'currencies.index.create_currency_btn' => 'Создать валюту',
    /**
     * Currency form.
     */
    'currencies.form.update_btn' => 'Обновить валюту',
    'currencies.form.create_btn' => 'Создать валюту',
    'currencies.form.notify.created' => 'Валюта создана',
    'currencies.form.format_help_text' => [
        'Это позволяет указать формат, который должны использовать ценовые поля для этой валюты.',
        'При отображении Lunar будет заменять <code>{value}</code> на отформатированную цену. Например, <code>£{value}</code>.',
        'Вы всегда должны включать <code>{value}</code> для правильной работы.',
    ],
    /**
     * Attributes.
     */
    'attributes.index.title' => 'Атрибуты',
    'attributes.show.title' => 'Редактирование атрибутов :type',
    'attributes.show.locked' => 'Этот атрибут требуется системой и поэтому заблокирован для редактирования.',
    'attributes.create.title' => 'Создать атрибут',
    'attributes.form.update_btn' => 'Обновить атрибут',
    'attributes.form.create_btn' => 'Создать атрибут',
    'attributes.form.notify.created' => 'Атрибут создан',
    /**
     * Tags.
     */
    'tags.show.title' => 'Редактировать тег',
    'tags.index.title' => 'Теги',
    'tags.index.table_row_action_text' => 'Редактировать',
    'tags.form.update_btn' => 'Обновить тег',
    'tags.form.create_btn' => 'Создать тег',
    'tags.form.notify.updated' => 'Тег обновлен',
    /**
     * Activity log page.
     */
    'activity_log.index.title' => 'Журнал действий',
    /*
     * Product Options
     */
    'product.options.index.title' => 'Опции',
    'product.options.index.create_btn' => 'Создать опцию',
    'product.options.index.table_row_action_text' => 'Редактировать опцию',
    /**
     * Taxes.
     */
    'taxes.tax-zones.index.title' => 'Налоговые зоны',
    'taxes.tax-zones.confirm_delete.title' => 'Подтвердите удаление',
    'taxes.tax-zones.confirm_delete.message' => 'Вы уверены, что хотите удалить эту налоговую зону? Это может привести к потере данных.',
    'taxes.tax-zones.customer_groups.title' => 'Ограничить группами клиентов',
    'taxes.tax-zones.customer_groups.instructions' => 'Выберите группы клиентов, для которых вы хотите ограничить эту зону. Снимите флажок, чтобы не устанавливать ограничений.',
    'taxes.tax-zones.create_title' => 'Создать налоговую зону',
    'taxes.tax-zones.create_btn' => 'Создать налоговую зону',
    'taxes.tax-zones.delete_btn' => 'Удалить налоговую зону',
    'taxes.tax-zones.index.table_row_action_text' => 'Управление',
    'taxes.tax-classes.index.title' => 'Налоговые классы',
    'taxes.tax-classes.index.create.title' => 'Создать налоговый класс',
    'taxes.tax-classes.index.update.title' => 'Обновить налоговый класс',
    'taxes.tax-classes.create_btn' => 'Создать налоговый класс',
    'taxes.tax-zones.price_display.label' => 'Отображение цены',
    'taxes.tax-zones.price_display.excl_tax' => 'Исключить налог',
    'taxes.tax-zones.price_display.incl_tax' => 'Включить налог',
    'taxes.tax-zones.zone_type.countries' => 'Ограничить по странам',
    'taxes.tax-zones.zone_type.states' => 'Ограничить по штатам / провинциям',
    'taxes.tax-zones.zone_type.postcodes' => 'Ограничить по почтовым кодам',
    'taxes.tax-zones.tax_rates.title' => 'Налоговые ставки',
    'taxes.tax-zones.tax_rates.create_button' => 'Добавить налоговую ставку',
    'taxes.tax-zones.save_btn' => 'Сохранить налоговую зону',
    'taxes.tax-classes.index.delete_message' => 'Вы уверены? Это может привести к потере данных.',
    'taxes.tax-classes.index.delete_message_disabled' => 'Вы не можете удалить налоговый класс, который связан с вариантами продукта',
    'taxes.tax-classes.index.delete_message_default' => 'Вы должны выбрать новый налоговый класс перед удалением',
    'taxes.tax-zones.form.title' => 'Страны', 
    /**
     * Customer Groups.
     */
    'customer-groups.index.title' => 'Группы клиентов',
    'customer-groups.index.create_btn' => 'Создать группу клиентов',
    'customer-groups.index.table_row_action_text' => 'Редактировать группу',
    /**
     * Customer Groups show page.
     */
    'customer-groups.show.title' => 'Редактировать группу клиентов',
    /**
     * Customer Groups create page.
     */
    'customer-groups.create.title' => 'Создать группу клиентов',
    'customer-groups.form.default_instructions' => 'Установите, должна ли эта группа клиентов быть группой клиентов по умолчанию',
];
