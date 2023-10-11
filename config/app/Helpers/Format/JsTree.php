<?php

namespace App\Helpers\Format;

class JsTree
{
    public static function getDataFor($entity, $parentID = 'parent_id', $selectedDataIDs=null)
    {
        $allData = $entity::with('children')->get();
        if ($allData->count() == 0) return json_encode([]);

        $data = $allData->groupBy($parentID);
        $data['root'] = $data[''];
        unset($data['']);
        $arr_data = [];
        $children = [];
        foreach ($data['root'] as $item) {

            $parent = [
                'id' => $item->id,
                'text' => $item->title,
                'icon' => 'la la-angle-double-down text-warning',
                'state' => [
                    'opened' => true,
                    'disabled' => false,
                    'selected' => !is_null($selectedDataIDs) && (in_array($item->id, $selectedDataIDs)),
                    //'checked' => !is_null($selectedDataIDs) && (in_array($item->id, $selectedDataIDs))
                ]
            ];

            if(isset($data[$item->id])){
                /*foreach ($item->children as $child_item) {*/
                foreach ($data[$item->id] as $child_item) {
                    $arr_child_data = [
                        'id' => $child_item->id,
                        'text' => $child_item->title,
                    ];
                    if (isset($data[$child_item->id])) {

                        $arr_child_data['icon'] = 'la la-angle-double-down text-warning';
                        $arr_child_data['state']['opened'] = true;
                        $arr_child_data['children'] = $entity::buildChildren($entity, $data, $child_item, $selectedDataIDs);
                    } else $arr_child_data['icon'] = 'la la-check text-success';

                    if (!is_null($selectedDataIDs) && in_array($child_item->id, $selectedDataIDs))
                        $arr_child_data['state']['selected'] = true;

                    $children[] = $arr_child_data;

                }
                $parent['children'] = $children;
                $arr_data[] = $parent;
                $children = [];
            }else{
                $arr_data[] = $parent;
                $children = [];
            }


        }
        $data_json = (is_array($arr_data) && count($arr_data) > 0) ?  json_encode($arr_data) : null;
        return $data_json;

    }
    public static function buildChildren($entity, $data, $child_item, $selectedDataIDs = null)
    {
        $temp_children = [];
        if (isset($data[$child_item->id])) {
            foreach ($child_item->children as $child_item) {

                $temp = [
                    'id' => $child_item->id,
                    'text' => $child_item->title,
                ];
                if (isset($data[$child_item->id])) {
                    $temp['icon'] = 'la la-angle-double-down text-warning';
                    $temp['state']['opened'] = true;
                    $temp['children'] = $entity::buildChildren($entity, $data, $child_item, $selectedDataIDs);
                } else $temp['icon'] = 'la la-check text-success';

                if (!is_null($selectedDataIDs) && in_array($child_item->id, $selectedDataIDs)) {
                    $temp['state']['selected'] = true;
                }

                $temp_children[] = $temp;
            }
            return $temp_children;
        }
    }

}
