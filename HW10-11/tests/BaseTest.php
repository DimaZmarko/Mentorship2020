<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use src\Services\TextAnalyzer;
use src\Storage\Storage;

class BaseTest extends TestCase
{
    public const ENG_TEXT = 'At consectetur lorem donec massa. Tortor posuere ac ut consequat semper viverra nam. Sit amet commodo nulla facilisi nullam vehicula. Et pharetra pharetra massa massa ultricies mi quis. Suscipit adipiscing bibendum est ultricies integer quis auctor elit. Curabitur gravida arcu ac tortor dignissim convallis. Eu sem integer vitae justo eget. Sed egestas egestas fringilla phasellus faucibus scelerisque eleifend donec pretium. Massa eget egestas purus viverra accumsan in. Non quam lacus suspendisse faucibus. At varius vel pharetra vel turpis. Sit amet justo donec enim diam vulputate. Diam sollicitudin tempor id eu nisl nunc mi. Nunc sed augue lacus viverra vitae congue eu. Ac turpis egestas sed tempus urna et pharetra pharetra. Ornare arcu dui vivamus arcu. Cursus vitae congue mauris rhoncus aenean vel. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Adipiscing diam donec adipiscing tristique risus nec. Lacus laoreet non curabitur gravida arcu ac tortor.';
    public const UKR_TEXT = 'Речення роблять із світу буття, яке і є щастям. Життя речень виконує у бутті таку саму функцію, як обмін речовин, метаболізм у існуванні органічної матерії. Для якісного буття необхідний налагоджений реченнєвий обмін. Маючи доступ до атомів-слів, ми можемо поглинати світ у вигляді сполук-речень. Ми ж їх можемо розщеплювати, перетворюючи у ріст. І ми їх мусимо синтезувати самі. Справа не у вагомості думки, не у мальовничості образів. Буття присутнє тільки у синтезованих, сформульованих реченнях. Тобто у самому процесі синтезу. Речення можуть бути різні – короткі, довгі, дуже довгі, простіші, складніші, точніші, прозоріші, блискучіші, лапідарні, відшліфовані, промовлені, записані, непромовлені. Щастя буття залежить тільки від інтенсивності синтезу. Тобто не від кількості, а від неперервності процесу структурування мови, в якій проживаємо життя';

    /**
     * @var TextAnalyzer
     */
    protected $textAnalyzer;

    /**
     * @throws \Exception
     */
    public function setUp(): void
    {
        $storageMock = $this->getMockBuilder(Storage::class)
            ->getMock();

        $this->textAnalyzer = new TextAnalyzer($storageMock);
    }

    /**
     *
     */
    public function tearDown(): void
    {
        $this->textAnalyzer = null;
    }
}
