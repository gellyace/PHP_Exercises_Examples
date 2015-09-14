<?php

//return an array of callable methods (include inherited methods)
function getCallableMethods($object){
    $methods = get_class_methods(get_class($object));

    if(get_parent_class($object)){
        $parent_methods = get_class_methods(get_parent_class($object));
        $methods = array_diff($methods, $parent_methods);
    }
    return $methods;
}

//return an array of inherited methods
function getInheritedMethods($object){
    $methods = get_class_methods(get_class($object));

    if(get_parent_class($object)){
        $parentMethods = get_class_methods(get_parent_class($object));
        $methods = array_intersect($methods, $parent_methods);
    }
    return $methods;
}

//return an array of superclasses
function getLineage($object){

    if(get_parent_class($object)){
        $parent = get_parent_class($object);
        $parentObject = new $parent;

        $lineage = getLineage($parentObject);
        $lineage[] = get_class($object);
    }
    else
        $lineage = array(get_class($object));

    return $lineage;
}

//return an array of subclasses
function getChildClasses($object){
    $classes = get_declared_classes();
    $children = array();

    foreach ($classes as $class){
        if(substr($class, 0, 2) == '__')
            continue;

        $child = $class; //edited : removed new

        if(get_parent_class($child) == get_class($object))
            $children[] = $class;

    }

    return $children;
}

//display information on an object
function printObjectInfo($object){
    $class = get_class($object);
    
    echo "<h2>Class</h2>";
    echo "<p>{$class}</p>";
    echo "<h2>Inheritance</h2>";
    echo "<h3>Parents</h3>";

    $lineage = getLineage($object);
    array_pop($lineage);

    if(count($lineage)>0)
        echo "<p>" .join(" -&gt; ", $lineage) . "</p>";
    else
        echo "<i>None</i>";

    echo "<h3>Children</h3>";
    $children = getChildClasses($object);
    echo "<p>";
    if(count($children)>0)
        echo join(" , ", $children);
    else
        echo "<i>None</i>";
    echo "</p>";

    echo "<h2>Methods</h2>";
    $methods = getCallableMethods($object); //$class --> $object
    $object_methods = get_class_methods($object); // get_methods --> get_class_methods
    
    if(!count($methods))
        echo "<i>None</i><br/>";
    else{
        echo "<p>Inherited methods are in <i> italics</i>.</p>";
        foreach($methods as $method){
            if(in_array($method, $object_methods))
                echo "<b>{$method}</b>();<br/>";
            else
                echo "<i>{$method}</i>();<br/>";
        }
    }

    echo "<h2>Properties</h2>";
    $properties = get_class_vars($class);

    if(!count($properties))
        echo "<i>None</i><br/>";
    else{
        foreach(array_keys($properties) as $property)
            echo "<b>\${$property}</b> = ". $object->$property . "<br/>";
    }

    echo "<hr/>";
}

//Implementation of the above functions

class A{
    public $foo = "foo";
    public $bar = "bar";
    public $baz = 17.0;

    function firstFunction() {}
    function secondFunction() {}
}

class B extends A {
    public $quux = false;

    function thirdFunction() {}
}

class C extends B { }

$a = new A;
$a->foo = "sylvie";
$a->bar = 23;

$b = new B;
$b->foo = "bruno";
$b->quux = true;

$c = new C;

printObjectInfo($a);
printObjectInfo($b);
printObjectInfo($c);
?>
