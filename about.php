<?php
include('layout_member/header.php');
include('layout_member/left.php');


?>
<?php
session_start();
if (!isset($_SESSION['member'])) {
    header("location:login.php");
}
$row = $_SESSION['member'];
$id = $row['mid'];
$n = $row['name'];
$e = $row['email'];
$p = $row['phone'];
?>

<div id="right">
    <div class="about">
        <h1 class="center">ABOUT US</h1>
        <div>

            <p>The Gym Subscription system is a web-based application that allows gym members to manage their
                subscriptions. The system provides users with the ability to sign up for gym memberships, view
                membership options and pricing. The system has two types of users: gym members, gym trainer and gym
                administrators. Gym members can sign up for memberships, view their membership details. Gym
                administrators can manage gym membership data,.Gym trainers can view member information regarding their
                exercise. The system uses CRUD operations to manage gym membership data. Users can create new membership
                records, update membership information, and delete memberships if necessary. The Gym Subscription system
                is designed to be user-friendly and easy to use. It provides users with a streamlined process for
                managing their gym memberships and attendance, making it a valuable tool for both gym members and
                administrators
            </p>
            <p style=" font-size: 15px; ">Contact: xxxxxxxxxx</p>
        </div>
        <br>
        <p style="color: #A7ECEE;">
            -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-
        </p>
        <!-- owner description -->
        <div>
            <h1 class="center">GYM OWNER </h1>


            <div class="about_author">
                <img src="img/static/aboutboy.jpg" alt="">
                <br>
                <p>Name: Suman Mushyakhwo <br>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus pariatur quos cumque! Voluptate
                    neque eligendi, qui soluta ex quisquam sint!
                </p>
            </div>

            <div class="about_author">
                <img src="img/static/aboutgirl.jpg" alt="">
                <br>
                <p>Name: Sharmila Pyatha <br>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus pariatur quos cumque! Voluptate
                    neque eligendi, qui soluta ex quisquam sint!
                </p>
            </div>
            <!-- gym discription00000000 -->
            <div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, sint repudiandae similique
                    commodi, velit ipsum at excepturi libero aperiam quidem ad consequuntur nemo in sed delectus eos ea
                    quisquam quae cupiditate? Corrupti laudantium nemo voluptatem eum quos magni ullam accusantium fugit
                    eligendi amet? Adipisci et delectus quis vero. Saepe ab eligendi magni nisi possimus ut modi iure
                    ipsam fuga. Praesentium necessitatibus dolorum delectus dolore earum suscipit quos eos? Eaque
                    commodi distinctio facilis, vitae veritatis consequatur architecto aspernatur, assumenda voluptas
                    odio alias quo iure pariatur, maxime cupiditate reprehenderit animi. Quod, voluptatibus optio vel
                    minus rerum cum cupiditate officiis! Ut eos saepe molestias aperiam facilis, a optio vero suscipit
                    repellat perferendis nam quasi delectus distinctio adipisci nemo, magnam unde facere rerum beatae
                    libero maiores laborum. Et dolorem dolorum nostrum nesciunt blanditiis placeat quas autem, sed illo,
                    recusandae commodi eligendi veritatis aperiam labore quidem eos possimus, mollitia repellat
                    consequatur non debitis. Aperiam omnis voluptates temporibus obcaecati doloremque error quisquam
                    nemo, optio deleniti vero commodi animi maiores deserunt repellat dignissimos assumenda. Aliquid
                    similique repellendus nulla nobis sint repellat cupiditate eos quos. Doloremque, labore temporibus
                    nemo porro suscipit reiciendis excepturi ipsam repellat earum illo saepe accusantium consequatur ea
                    eum ratione sapiente, molestiae necessitatibus adipisci facere placeat quia. Repudiandae commodi
                    debitis architecto similique, ex reiciendis quam unde dolor perspiciatis maiores vero corrupti
                    tempore rem illum. Minus eligendi accusantium officiis. Repellat temporibus fuga impedit consequatur
                    deleniti, soluta sint suscipit eos est, ut ipsa omnis facilis expedita quia harum eligendi
                    repudiandae vel. Pariatur repellat maxime sit eveniet odit, cupiditate deleniti corporis ea
                    perferendis nemo magnam deserunt perspiciatis labore qui impedit, dolore soluta et assumenda itaque
                    doloremque reiciendis omnis, veritatis quibusdam officia! Vitae impedit deleniti hic sint soluta
                    veritatis quidem, eaque mollitia autem, in nobis praesentium totam pariatur. Incidunt quo fuga
                    delectus temporibus dolor deleniti, animi distinctio officiis error commodi culpa, libero qui ullam
                    nam enim nesciunt blanditiis laudantium pariatur rem eum. Amet sunt, molestias laborum, reiciendis
                    dolores tenetur deserunt tempore iusto eaque nisi rerum praesentium est odit voluptatem, modi dolore
                    perferendis quasi dignissimos. Quod eligendi quae, est magni nesciunt aliquam qui dolore dignissimos
                    ut excepturi totam provident dolores maxime eum dolorem repellat fugiat minus sed illo fugit hic
                    iure beatae accusantium sapiente! Consequatur quibusdam sapiente tenetur. Similique porro expedita
                    libero, eligendi quidem sequi, saepe numquam sapiente maxime officiis ad mollitia minima quas
                    nesciunt magni itaque autem suscipit accusantium, officia nulla excepturi fugit praesentium
                    quibusdam ratione. Dolorem molestias cupiditate sed beatae, quis dicta soluta cum molestiae saepe,
                    possimus enim distinctio perspiciatis odio esse incidunt temporibus explicabo rem dolore deleniti?
                    Magnam quibusdam amet vero modi sit deleniti est. Ut molestias voluptatibus nemo explicabo sed velit
                    unde asperiores quasi. Debitis ad repellat dolorem, minima impedit id nemo ab consequuntur numquam,
                    temporibus quo placeat tempora voluptatum illum neque tenetur, dolor laudantium eos officiis.
                    Expedita harum pariatur excepturi beatae consequatur ad soluta rem omnis, laudantium voluptas quod
                    ratione ipsa officia maiores cumque at nesciunt ullam ex perferendis molestiae unde doloribus. Optio
                    expedita exercitationem eveniet, numquam quia at non? Eligendi enim, sint architecto qui saepe
                    voluptates iste? Recusandae distinctio cumque perferendis dignissimos incidunt autem porro voluptas
                    sequi quod ducimus, illum voluptatem asperiores sint neque culpa nulla omnis labore, eveniet
                    expedita saepe earum? Magnam delectus molestiae officiis aliquid qui commodi mollitia ad quod, ex
                    nesciunt vero dolores? Harum iste veniam et aperiam. Placeat, suscipit similique maxime id animi
                    error esse! Fuga, id est a itaque excepturi porro natus suscipit quae voluptate molestias commodi
                    corrupti mollitia facere maxime? Aliquid tenetur, in debitis vitae ex perspiciatis ipsum nulla rem
                    nemo similique veritatis deserunt odit, ad, nobis totam. Commodi atque incidunt explicabo amet
                    similique maiores dolore quaerat officia at, consequatur ab sed ratione velit voluptatem nobis,
                    voluptate quibusdam voluptatum modi iusto maxime, animi facere iure natus minima. Vitae autem
                    eveniet hic suscipit. Rerum eius obcaecati iusto voluptatum, necessitatibus deleniti maxime sint
                    doloribus, in ab excepturi similique! Suscipit quos quibusdam expedita cumque. Doloribus fugit porro
                    nihil veritatis omnis a, sapiente ullam veniam ratione, libero vel recusandae, quibusdam cum
                    asperiores labore? Cupiditate laudantium nobis reprehenderit eum! Provident quo, quidem consequatur
                    ut corrupti sapiente! Voluptate officiis eaque eos? Qui fuga tempore excepturi. Culpa labore ex
                    iusto saepe, iste dolores magni, reprehenderit ullam dolorem tempore et laudantium! Voluptate quis
                    expedita odit illo porro repudiandae nemo quaerat at itaque ratione impedit, ipsa quas delectus ea
                    dolor fugiat eum quisquam dignissimos temporibus. Officia libero accusamus repellat in, ipsa rerum
                    mollitia quas doloribus qui autem illum iure tempore, ad nihil neque nostrum eligendi beatae! Id
                    consequuntur quibusdam tempore numquam, hic sed aliquam autem consequatur labore possimus iusto
                    nulla eligendi commodi. Nesciunt distinctio, vel provident ipsa reiciendis tempora sapiente repellat
                    quia minus! Accusamus, ullam perferendis ratione itaque exercitationem labore a, quod quia
                    praesentium veniam ut aliquam, alias mollitia temporibus sapiente dignissimos nesciunt tempore
                    distinctio odio vel cupiditate. Saepe necessitatibus, reiciendis veritatis cum ab incidunt sunt,
                    recusandae nobis harum iure quidem veniam itaque pariatur porro eum eveniet nihil sint quos quas
                    distinctio! Maiores illo fugit repellat. Veniam voluptas architecto dolore soluta libero
                    necessitatibus temporibus, voluptatem natus esse qui vero impedit! Corrupti deleniti voluptatum
                    nulla illum tempora eius quisquam consequatur dignissimos, doloribus, doloremque provident
                    molestias. Eaque animi eum quaerat nostrum dolorum! Ad dolore modi enim, minima a, dolorem possimus
                    eum praesentium fugit tempore voluptates? Animi dolores aspernatur incidunt in error. Ipsa quos
                    reprehenderit tempore culpa cum beatae nemo incidunt mollitia perspiciatis at, quibusdam neque
                    sequi? Fugiat voluptas iste corporis officia, perferendis iusto ea, vel sunt qui tempore consequatur
                    adipisci molestias, eaque fuga totam unde cum assumenda sapiente dignissimos. Reiciendis blanditiis
                    quod nobis laborum consequuntur quibusdam aperiam, iusto dolorum enim atque nam illo consequatur,
                    eius error voluptatem hic quae eos, rerum doloremque. Libero enim quisquam dicta nemo error ratione
                    obcaecati culpa, tempore vel illo doloremque officia voluptatum ut doloribus excepturi fugit
                    possimus aliquid aperiam labore a molestiae consectetur magni saepe. Magni atque est error eum?
                    Nesciunt nulla amet, at repellat iure pariatur facilis praesentium! Voluptate nisi nobis tempora.
                    Tempora reprehenderit id modi dolores earum facilis quas. Similique explicabo alias, at blanditiis,
                    totam quis enim maxime eveniet voluptate beatae molestias delectus est quibusdam. Ullam, dolorum
                    alias tempore voluptates officiis a ducimus ea iusto praesentium nulla incidunt rerum ipsa
                    repellendus veritatis dicta laboriosam adipisci. Dolorem ullam error laudantium repellendus
                    voluptates itaque? Iusto vel rerum ut explicabo quasi! Totam explicabo commodi ut, ducimus possimus
                    suscipit quos labore quidem recusandae cupiditate quam illo beatae quasi enim? Omnis error impedit
                    veniam nam, aut voluptatem dolores vitae ullam quasi eum sint non consequuntur, voluptatum rem nihil
                    aperiam cupiditate odio. Et, eligendi ullam maiores, nemo enim veritatis vero nisi facilis rerum
                    aliquam, qui architecto quae blanditiis maxime autem illo fuga? Vero impedit fuga laudantium dolore
                    id deserunt non aliquid itaque officiis. Incidunt nesciunt recusandae esse necessitatibus iusto. Hic
                    beatae asperiores inventore ipsam. Ipsam, sed ullam ipsa exercitationem similique cumque eaque
                    facere hic iste, nam sit laboriosam fuga unde voluptatum molestias voluptates laudantium tempore in
                    labore eius omnis quam aliquid praesentium. Quos incidunt ad eius, veritatis nihil quam itaque saepe
                    nesciunt modi delectus ipsum minus explicabo omnis. Dolorem quisquam quo cumque. Cum ab placeat
                    molestiae, alias vel necessitatibus doloremque nemo et ea facere praesentium maxime tempora mollitia
                    doloribus, ullam quam, quas laboriosam eius possimus? Voluptatibus aperiam sequi exercitationem
                    quaerat repudiandae doloremque temporibus quia iusto! Facilis dolore, dolorum quidem at,
                    voluptatibus cum laborum vitae aliquid nisi tempora doloremque corrupti, officia qui nam? Optio, qui
                    culpa? Voluptatem, exercitationem perspiciatis officiis quos optio iure, perferendis amet iusto
                    illum ab ipsa ullam consectetur ipsam dolore expedita nisi quam officia facilis voluptas voluptate.
                    Delectus iste, quaerat quisquam libero quia, autem commodi laborum voluptates quibusdam nisi dolorum
                    beatae quasi? Delectus libero, dicta ut optio accusantium voluptas deleniti nihil aspernatur animi
                    eveniet voluptates totam alias tenetur ipsam nam ullam consequuntur culpa ab adipisci harum eos? A
                    nobis veniam hic repellat molestias, illo autem recusandae vero laudantium porro fuga ex velit eos.
                    Assumenda fugiat quisquam a temporibus ipsum. Id saepe dolorem iure necessitatibus vero magni.
                    Nostrum voluptatum dolorum animi perferendis eveniet quisquam, porro fuga necessitatibus nesciunt
                    id. Totam commodi dignissimos explicabo enim quos accusantium recusandae assumenda officia nulla id
                    iste, natus quisquam aliquid perspiciatis dolores alias qui in sit beatae, voluptas saepe! Tempora
                    maxime consequuntur enim minima explicabo. Ducimus sed, modi, eaque eos accusantium molestias
                    corporis voluptatibus in, blanditiis quaerat ab. Cum sit possimus minima eveniet, quaerat velit
                    numquam beatae eius pariatur fugiat mollitia commodi similique nobis molestias nesciunt est, at enim
                    porro unde iste necessitatibus quis veniam aliquam corrupti. Est et quaerat quisquam totam illo amet
                    reprehenderit. Hic quaerat eveniet accusamus possimus nobis tenetur non asperiores nulla officiis?
                    Quae odio deleniti maiores vel nam libero soluta, quas necessitatibus et nisi nemo expedita autem
                    sunt tempora placeat inventore porro qui cum accusantium delectus, dolorum iure? Distinctio quae
                    quisquam, nisi nulla esse enim ex odio, laudantium laboriosam facilis, eos voluptatem vitae
                    recusandae? Laborum error porro magnam nisi non ipsam libero tempora, et corrupti, quae, tenetur
                    consequatur. Ad doloremque, autem quaerat aliquid maxime, minus nostrum, dicta minima accusamus
                    architecto enim eos distinctio? Reprehenderit aliquid asperiores aperiam itaque expedita ipsum,
                    excepturi, omnis sequi dicta magnam dolor officia, iusto necessitatibus quisquam! Sapiente dicta
                    beatae nam deleniti! Alias corporis labore aut nisi quibusdam rerum necessitatibus, molestias iure
                    saepe vel enim. Nemo doloribus illo cumque distinctio harum recusandae similique iusto quisquam,
                    dolorem aspernatur voluptatum voluptatem minima, obcaecati facilis esse animi sed fuga nobis
                    reprehenderit nihil? Quibusdam nostrum facere sapiente, earum, doloribus voluptatum officia sequi
                    consequuntur est asperiores fugiat aliquid. Voluptates perferendis magni reiciendis officia vero non
                    sequi ducimus pariatur illo et consequuntur, corrupti dolor suscipit error est officiis eaque,
                    possimus ex nobis harum asperiores mollitia consectetur nesciunt quisquam! Enim magni debitis illum
                    aut fugiat praesentium ad quidem. Fuga dolore ipsum quos quisquam est eaque eum neque, nam maiores
                    commodi! Numquam doloribus est, amet aut totam eum mollitia ullam! Praesentium illo sequi enim.
                    Debitis sunt aliquam fuga deserunt impedit ullam esse dolorem numquam quo accusantium modi suscipit
                    sequi ipsum reiciendis atque perspiciatis nisi iste distinctio, quia quasi culpa obcaecati velit!
                    Provident quos similique laboriosam dolores officia ipsam. Aliquam, at rerum, quasi cupiditate
                    doloribus, nam vel inventore vitae voluptate voluptatum quidem est cum facere quaerat. Dolore autem
                    enim sit quibusdam odio doloribus. Enim vel quisquam quis corrupti! Quaerat asperiores distinctio
                    rem vero aliquam laboriosam facere ipsa id doloremque quae officiis libero culpa, dolore omnis
                    similique minima voluptatum voluptate labore deleniti exercitationem dolorem. Blanditiis sint
                    libero, eum ab, nulla voluptates nesciunt rem, aperiam saepe quo repellendus vitae deleniti?
                    Asperiores nemo dolorem quibusdam totam doloremque id officia inventore nobis. Perferendis inventore
                    minus illum veritatis ducimus est dolor, atque, eaque expedita, alias repellendus. Amet aspernatur
                    non eum exercitationem iusto quaerat quo quos obcaecati fugiat inventore, harum esse dolores dolorum
                    quis blanditiis animi et rem voluptate minus debitis nisi! Fuga harum similique autem, cumque
                    doloribus, fugiat dignissimos, laboriosam possimus reprehenderit laudantium doloremque? Animi
                    maiores nisi hic quis molestias possimus! Accusantium placeat dignissimos sint alias necessitatibus
                    commodi ex mollitia voluptas iste, incidunt labore ad nesciunt quo! Neque consequatur omnis cumque
                    assumenda natus quidem, ab illum ex iusto, fugit corrupti aliquam deserunt harum eius alias culpa
                    autem inventore facilis quas dignissimos porro reiciendis excepturi. Cum aspernatur assumenda vero
                    ad nam reiciendis voluptates. Velit debitis obcaecati ad facilis sequi sed qui? Est, eveniet ab enim
                    sapiente rerum ea omnis beatae. Alias, facere laudantium! Dolorem, hic enim animi est consequatur
                    veritatis esse quo incidunt id quaerat delectus nisi aspernatur modi perferendis blanditiis
                    voluptate officiis tempora minus. Quis ratione eligendi id iste! At numquam, commodi provident
                    corporis illum sint id, fugit sequi nulla velit architecto enim sapiente eaque, asperiores quis
                    aspernatur perspiciatis similique ab nemo suscipit quibusdam. Velit sequi porro dolorum harum atque
                    quibusdam ut esse tempora eius corrupti, beatae corporis minima temporibus culpa nam similique
                    provident iste dignissimos laudantium nulla consequuntur dolore. Ducimus at exercitationem saepe,
                    quos labore assumenda error dolorem atque earum odit voluptatum dignissimos quidem alias delectus in
                    voluptas vel iusto odio quia repellat aliquid similique nobis quae veniam. Vitae, libero. Rem sunt
                    nostrum nobis architecto, similique fugit accusamus quidem numquam, doloribus at omnis id? Itaque,
                    aspernatur maxime. Natus aut dicta explicabo nostrum accusantium in earum corporis maiores,
                    architecto omnis tempore esse aliquam deserunt labore iste mollitia saepe reiciendis quisquam illum
                    expedita rem quae odit eligendi dignissimos? Consequuntur soluta, aperiam, vero earum id ipsam
                    reprehenderit aspernatur, nobis consectetur nisi quis facere! Possimus quo quam voluptates!
                    Consequuntur beatae minima veritatis? In facere officia voluptates ad fugiat eaque! Labore quibusdam
                    obcaecati asperiores nostrum ab tenetur saepe fugit impedit vel ea praesentium, in sapiente culpa
                    optio ratione maxime veniam at beatae, exercitationem vitae architecto laboriosam corrupti!
                    Molestias qui placeat sapiente dignissimos. Nesciunt in vero deleniti, cupiditate consequatur
                    obcaecati reiciendis corrupti iste? Modi quibusdam magnam fuga eaque, delectus mollitia vero enim
                    cumque sed et provident, vel officiis ducimus sunt molestiae nisi impedit non fugit ad ipsum vitae
                    culpa laborum! Vero debitis consectetur consequatur quo. Iste, tempore fugit repellendus maiores
                    ducimus, nulla voluptate commodi aliquam consequatur ab illo! Eos officiis asperiores saepe, nemo
                    perspiciatis cumque sed minima dignissimos modi suscipit voluptate soluta? Iusto temporibus non
                    tenetur nam voluptatem inventore expedita aspernatur, ut officiis iste adipisci aut eos ab sunt
                    dolorem amet, porro assumenda officia veniam. Architecto nihil dolorum laborum quis ratione hic,
                    quos tempora a eum deserunt enim, maiores distinctio blanditiis libero nulla illum alias suscipit
                    totam et, sed corporis maxime iste deleniti. Natus odio, amet labore eum magni officia error ipsam
                    dolor voluptatum hic voluptatem quaerat nihil dolore possimus magnam? Dolorum saepe fugiat maiores
                    ipsam, quae, deleniti iure architecto ipsum sint quia voluptate soluta, odit culpa molestiae illum
                    quod qui praesentium commodi totam beatae dicta. Possimus explicabo beatae nemo sequi accusamus
                    blanditiis quis incidunt! Fugiat unde veniam ipsa fuga expedita omnis vitae vel laudantium illo
                    itaque soluta doloremque suscipit quas cumque, a delectus. Dolorum, eius quo. Blanditiis tenetur
                    nisi quisquam libero quas eligendi animi eius enim pariatur cum, facere excepturi, quia magnam,
                    debitis officia vitae ipsa omnis ut necessitatibus. Accusamus animi consectetur molestias sequi
                    voluptatibus nam quia ipsum quibusdam veniam exercitationem molestiae expedita perferendis vitae
                    blanditiis officia enim, a obcaecati neque alias earum laboriosam? Eveniet sint impedit obcaecati,
                    quidem eaque sed repellat deleniti reprehenderit ea fuga delectus a ut eius, dolores nostrum dolore
                    exercitationem, eos non. Alias et laborum exercitationem magnam esse culpa vero ipsa pariatur sunt
                    sit iste voluptates quo nihil provident ullam quae corporis quidem velit incidunt consequuntur,
                    minima nam? Commodi, hic illo ea totam inventore cumque veritatis nemo dolore! Iure tempore,
                    recusandae obcaecati voluptates debitis dicta quasi, eligendi nihil nobis velit voluptatum dolorem
                    et magnam, sit repellendus animi exercitationem ab quis assumenda culpa sed voluptas minus. Fugiat
                    optio, doloremque debitis quam omnis fugit. Quis ad ea accusantium tenetur deleniti, aliquid qui
                    tempora quae eos quidem debitis molestias velit ipsam maxime. Omnis ipsum voluptatum eos quaerat
                    quam maiores, saepe ullam pariatur explicabo provident hic commodi vero dolorem. Beatae, ea illo
                    tempore vel quos ipsa deleniti dolorum nemo autem et laudantium fuga repellendus rerum omnis
                    quibusdam, vitae itaque ad nostrum nulla doloribus praesentium! Voluptatibus quae expedita maiores
                    asperiores itaque ex nisi amet aperiam dolor quaerat odio laboriosam aut, vero accusamus vitae animi
                    dolore! At, mollitia facere suscipit, unde nobis incidunt explicabo, aut sapiente blanditiis atque
                    adipisci! Debitis eum tenetur ullam molestiae! Ad autem ratione distinctio hic, laborum unde
                    recusandae accusamus nihil ipsum! Odit mollitia quis magnam et quod itaque fugiat porro impedit
                    cupiditate in quae officiis, cumque quidem incidunt iure temporibus, esse soluta deleniti explicabo
                    expedita necessitatibus. Aut amet beatae maxime quod, libero rem corporis ipsum optio. Provident
                    quidem minima eos ipsa repellendus aliquid natus dolorem iure, voluptates pariatur temporibus veniam
                    tempora maxime beatae ut, eius et porro possimus dolore. Nostrum, autem eos? Cupiditate eum nemo qui
                    unde quia veritatis labore sint autem, officia debitis placeat consectetur, animi eaque blanditiis
                    atque aliquam ad minima. Dolorum eos maiores expedita sapiente! Aut id velit debitis dolor incidunt
                    quam vitae, dolorem veniam laborum quibusdam placeat officiis, provident ullam commodi nobis vero
                    perferendis at, minus repudiandae eligendi tempora maxime expedita? At facilis nostrum ratione
                    nesciunt quasi officia totam! Aliquid, incidunt. Quis, repellendus vitae, veritatis, rem minus
                    tempore magni repellat maxime nostrum facilis praesentium ut consequuntur modi fuga odio hic minima
                    laboriosam numquam impedit officia. Cum, sed alias, blanditiis eveniet debitis laborum illum
                    mollitia fugiat obcaecati voluptatum voluptate repellat? Magni deserunt aliquam quisquam fugit neque
                    accusantium iste? Iure maxime cupiditate vero voluptatem eum, molestiae odio facilis obcaecati totam
                    vitae repellat ad blanditiis, rem ullam. Corrupti ad nobis iste fuga officia voluptatibus
                    blanditiis? Debitis officiis reprehenderit expedita tempore, minus cumque consequatur quisquam
                    doloremque numquam corrupti quod cupiditate odio laboriosam, at exercitationem repellat qui nulla
                    ex. Maiores, provident nobis. Deserunt rerum doloribus doloremque ipsa consectetur debitis!
                    Voluptates sequi, animi consequuntur facilis totam, provident at praesentium corrupti consectetur
                    necessitatibus aspernatur quod. Dolorem a quam provident, mollitia in dolor expedita sunt molestiae,
                    eius, nihil voluptas placeat laborum? Officia dolorum, pariatur molestias cupiditate voluptatum
                    incidunt maxime recusandae saepe voluptates sunt, sequi asperiores dignissimos accusamus explicabo
                    aspernatur libero earum, maiores commodi? Autem cumque quisquam, incidunt explicabo delectus vitae,
                    ea nobis corrupti earum suscipit tempora quam esse fuga expedita doloremque tenetur? Possimus
                    dolorum culpa odit dolor nulla mollitia, doloremque maxime reiciendis assumenda earum unde aliquid
                    facilis eveniet suscipit ducimus enim nihil molestias repellat vero quia. Id quas eveniet qui
                    veritatis voluptas obcaecati laudantium illum incidunt nisi? Omnis reiciendis facilis quia
                    perferendis quisquam? Nisi, enim temporibus, magni aperiam libero optio ipsam, doloremque quasi
                    distinctio accusantium ab repellendus. Quod nesciunt eos nostrum? Eum vitae unde, earum quod
                    voluptate blanditiis quis consequatur quam a. Dolore eius amet saepe temporibus modi explicabo sequi
                    in debitis corrupti earum velit quia sint harum dolorem maxime ea, accusamus eos quibusdam iste
                    nostrum delectus odit nisi. Laboriosam pariatur similique nihil qui optio saepe quibusdam numquam
                    ducimus. Debitis at dicta illum veniam iure quod mollitia autem dolorem? Placeat cum facere
                    obcaecati. Nostrum expedita, placeat quasi quod dicta nam esse possimus. A enim, autem doloremque
                    dolorem facere ex officia vero libero labore distinctio nesciunt voluptatum? Necessitatibus
                    voluptate adipisci maxime iure dicta eius incidunt ratione nesciunt doloremque minima eum expedita
                    quia aliquid cumque labore sit modi, reprehenderit qui voluptatum, consequatur dolorem quisquam
                    explicabo dolor. Corporis alias praesentium, consequuntur nisi at vero, impedit exercitationem
                    pariatur inventore rerum ipsa corrupti mollitia odio vitae quos eos a consequatur quia dicta?
                    Consequuntur id adipisci eligendi perferendis veritatis maiores ipsa dolorum, dicta incidunt rerum,
                    quaerat autem debitis natus rem at deserunt, dolores quibusdam quod fugit? Odit neque doloremque
                    quisquam, repellat explicabo qui. Molestiae repellat pariatur, aliquam ad fugiat nulla laboriosam
                    provident porro autem doloremque sint earum quaerat id ratione a mollitia ex officiis quibusdam
                    magnam nesciunt. Quo id totam rerum illo nulla ullam, laborum possimus molestiae! Molestiae cumque
                    voluptates rem nostrum veritatis perferendis laudantium earum tempora laboriosam tempore at non
                    officiis necessitatibus ad accusamus odio aliquam sunt vitae facilis accusantium, in dicta libero
                    eligendi. Necessitatibus repudiandae atque voluptatem earum molestias tempore accusamus,
                    consectetur, sint obcaecati unde modi officiis maiores quasi! Beatae repudiandae nisi amet nostrum
                    porro reiciendis tempora provident cum placeat sapiente commodi, ipsa nobis sequi quod repellat
                    velit incidunt laudantium! Provident cumque veritatis voluptate eaque error quo explicabo qui
                    officia repudiandae minus repellendus laboriosam earum, nisi sapiente sint unde delectus, eius natus
                    corporis nam asperiores harum! Soluta impedit ipsam dolores, natus fuga dolorem sint recusandae,
                    voluptate consectetur rerum id magni voluptatibus. Accusamus magnam quaerat iusto corporis nobis
                    unde earum sit quas aspernatur facere libero ullam dolor delectus facilis harum beatae vel ea
                    nesciunt at doloribus, suscipit provident! Eaque magni ipsam provident nostrum rerum dolorem quia
                    nihil architecto magnam quos accusantium dicta voluptatem modi facilis voluptas distinctio, minus
                    temporibus voluptatum. Nam temporibus eius maiores delectus laudantium dolore itaque ipsa aspernatur
                    repellat ullam magni suscipit iusto maxime quibusdam, facere totam ad ipsum repudiandae neque quod
                    fugit. Recusandae ea quaerat officia hic ab dolores at repellendus nisi accusamus quae eum quos quod
                    eos, iusto ratione maxime labore earum provident aut architecto. Amet, debitis! Aliquam, earum
                    tempora necessitatibus at fuga voluptatem harum minima dolor beatae. Architecto doloremque ut
                    ducimus error maiores sunt, quasi quidem suscipit fugit, blanditiis amet cumque labore accusantium.
                    Molestias eius velit hic consectetur suscipit voluptate quam sunt omnis animi ex cum quae, in ipsam
                    autem, neque nihil nisi libero? Omnis, assumenda soluta laboriosam sed reprehenderit sequi incidunt,
                    quas voluptates corporis nostrum nulla vel odio quo eius quam commodi, earum consequatur eos
                    placeat! Aliquid laboriosam necessitatibus maiores ratione dolorem in iste cupiditate, ab dolore
                    molestias esse assumenda quos exercitationem debitis nam, aspernatur quas consectetur vel quasi
                    voluptates atque magnam temporibus odit. Similique id quaerat sed at saepe laudantium illo cumque
                    maiores, quis voluptatibus fugit, aliquid qui porro quibusdam est sequi sit possimus earum quos
                    nulla, amet deleniti cum? Eligendi velit, rem ut dolorum dolore consequuntur unde itaque laudantium?
                    Tempore corporis vel suscipit, alias provident obcaecati fuga, aut voluptatem cumque, accusamus
                    doloribus. Id quas, quia nemo ipsum vel iste tempore adipisci libero. Dolore tenetur dolorem fugiat
                    unde quia cum id a reiciendis, asperiores corrupti expedita veniam, error odit! Ex molestiae porro,
                    consectetur aperiam vel aspernatur veritatis explicabo quia laboriosam alias perspiciatis. Eligendi
                    nesciunt veritatis alias perspiciatis atque et delectus error dignissimos numquam explicabo tempora
                    officiis est temporibus quod provident excepturi eum ab quo doloremque nam, inventore amet in unde
                    velit! Cum harum modi voluptas et? Laudantium sapiente a debitis repudiandae, esse molestiae
                    consequuntur excepturi voluptatum ut voluptatibus nemo quaerat. Laborum deleniti autem nesciunt
                    incidunt quos voluptas, sapiente ut error atque quod doloribus nisi quibusdam veniam numquam porro
                    cupiditate dolores culpa et nulla consequuntur, illo aliquam sequi repellendus. Sed et veritatis
                    iure laborum molestias eveniet voluptas accusamus exercitationem, pariatur quibusdam consectetur
                    cumque. Nisi maxime quasi ea repudiandae cumque at eligendi facere exercitationem aspernatur
                    cupiditate consequatur, reiciendis fugit corporis asperiores eius eaque quia, voluptatem blanditiis
                    quas nesciunt enim? Excepturi nobis quam fugiat suscipit, numquam, harum pariatur obcaecati non
                    labore illo ullam iure reprehenderit, eius cumque sapiente. Officiis, blanditiis numquam velit
                    beatae eius amet! Quod qui a vitae consectetur et error illo incidunt dolor itaque doloremque rem
                    inventore ea, ipsam quia labore laudantium fugit corporis impedit nisi? Quasi asperiores doloribus
                    numquam obcaecati quisquam rem, fugiat nobis fugit a quo vitae alias. Fuga nesciunt beatae esse rem
                    exercitationem eligendi asperiores tenetur magnam, eius impedit repellendus dignissimos quam
                    ducimus, dolor deserunt hic excepturi assumenda. Beatae perferendis maxime ex doloribus voluptatum
                    iste itaque quae tempora error, velit praesentium placeat neque, vero cumque veniam in non accusamus
                    vitae ea nostrum perspiciatis cupiditate! Aliquam ratione maiores facere! Pariatur voluptate maiores
                    voluptatibus nulla temporibus voluptatem eos obcaecati, dolor nihil, at explicabo ut officia fuga
                    dignissimos! Nihil quibusdam aliquam voluptatibus ipsum consectetur similique, voluptate hic,
                    delectus repudiandae nemo voluptates voluptas, minima qui! Similique temporibus id ratione nihil
                    odio aliquid non quibusdam, omnis est architecto perspiciatis, earum illo voluptas. At, neque unde
                    accusamus saepe ipsum culpa fugiat iure magni voluptatibus nostrum reprehenderit. Odio, itaque.
                    Doloremque, at cupiditate sed eum veritatis repudiandae natus sunt, iste tempora mollitia minus
                    similique minima eveniet, nesciunt labore nihil. Temporibus similique minima, odit veritatis
                    pariatur at reprehenderit! Impedit incidunt ullam animi voluptatum? Corporis debitis magnam minus
                    possimus, illum architecto rem? Nisi soluta, esse doloribus ad odio iusto doloremque, deserunt nobis
                    necessitatibus hic, expedita sed? Cupiditate ex nesciunt expedita adipisci, quam aliquam eveniet,
                    ipsam quaerat dolorem pariatur, minus magni? Quidem modi, unde impedit numquam sunt expedita
                    inventore quo ex ratione odit cumque ipsum similique tempore? Esse neque quisquam placeat tenetur
                    accusamus facere ratione temporibus repellendus at explicabo voluptatibus mollitia reprehenderit,
                    accusantium sequi, ut et corrupti, voluptas odio non saepe magni. Id, optio commodi error cum ipsum
                    eum doloremque minima debitis quos explicabo officia mollitia iure fugiat ipsam aperiam quidem culpa
                    non necessitatibus facere numquam maxime, molestiae, reprehenderit tempore porro? Voluptates, sed?
                    Amet eaque enim expedita quibusdam, voluptas, iure magnam ut neque hic at molestias inventore sed a
                    consectetur! Expedita saepe tempore aspernatur pariatur natus odio culpa libero deserunt harum cum
                    illo, asperiores exercitationem. Suscipit dicta vitae at veritatis dignissimos molestias, aut
                    laborum illum corrupti fugit facilis, aliquam quia quo quasi quam. Veritatis sapiente nam incidunt
                    recusandae voluptate! Amet sed optio dignissimos enim repellendus aliquid similique nesciunt, nulla
                    aut, placeat incidunt debitis dolorem? Assumenda, dicta. Reprehenderit, libero fugiat, facilis rem
                    eveniet hic delectus exercitationem asperiores suscipit enim impedit amet illum cum esse veniam
                    animi in quo harum rerum porro ut quisquam est labore! Voluptate sed optio at quidem aliquid
                    obcaecati unde dicta exercitationem nam temporibus doloribus cupiditate nisi, adipisci veniam,
                    doloremque saepe recusandae asperiores cumque libero. Ut in, porro cum ex deleniti obcaecati quasi
                    facilis? Sequi hic explicabo debitis magnam eligendi mollitia sit veniam, rerum perferendis, cumque
                    aliquid beatae dolorum blanditiis a. Aliquid temporibus dolorem saepe consectetur illum amet porro
                    necessitatibus ratione voluptatem hic voluptatum iusto beatae nobis quos perferendis, corrupti,
                    expedita quae. Nihil voluptatibus deleniti neque assumenda, reprehenderit nam architecto laboriosam,
                    quas doloremque et distinctio laborum in dolorem incidunt iusto ad corporis numquam facilis
                    doloribus aliquam vero officiis culpa. Tempore vitae maxime delectus. Esse ipsum nesciunt aliquam
                    nisi! Totam illum earum nemo! Deleniti ea libero officia exercitationem voluptatem fugit neque earum
                    aspernatur enim temporibus praesentium dolorum facere dignissimos ratione itaque, quo sequi
                    voluptate magnam modi aperiam accusantium eius expedita reiciendis officiis! Accusamus voluptatibus
                    dicta maxime necessitatibus quas maiores commodi? Repellendus quas obcaecati cumque. Nobis suscipit
                    ducimus sapiente. Repellendus unde eius culpa officiis ratione maxime, perspiciatis maiores tenetur
                    ipsum dolore eos qui placeat, facilis enim sed distinctio. Sit adipisci, esse modi recusandae vitae
                    soluta qui debitis deserunt ut excepturi autem delectus voluptatum harum at officia explicabo saepe
                    eligendi similique facere dolores! Deserunt tempora doloremque veniam, aut officia, corrupti
                    asperiores quaerat, vitae numquam minima temporibus consectetur debitis suscipit nisi pariatur
                    repellat. Temporibus ipsa harum cumque quas ex eligendi ullam est aliquid iste magnam cum voluptas
                    vitae deserunt rerum non velit, consectetur totam repellendus soluta? Ut aliquid ducimus, nam
                    sapiente, laboriosam modi cumque provident voluptate, distinctio corporis veritatis vel dolorum rem
                    impedit alias iure officiis! Nam expedita, excepturi, voluptate voluptatibus magnam voluptates quae,
                    facere molestias perspiciatis quas neque modi sunt aut tempore doloremque. A ducimus unde alias
                    dolorum. Nostrum eum error molestiae vitae fugiat, ducimus unde a ex debitis doloremque explicabo
                    non nihil perferendis, reprehenderit distinctio ut qui inventore atque mollitia adipisci! Vitae
                    eligendi consequuntur eaque culpa possimus repudiandae tempora exercitationem numquam sunt, aperiam
                    voluptate unde est autem dolor ab rerum alias quos voluptatibus quam. Asperiores ut veritatis
                    dignissimos, voluptatum, fugit aut quo voluptates nesciunt, repudiandae voluptate quibusdam fuga
                    harum odit praesentium eligendi inventore labore eveniet ipsam dolore? Error, fugiat. Perspiciatis
                    accusantium inventore alias odio excepturi! Perferendis nemo quod ipsam, iste incidunt ratione id
                    nesciunt nobis, repellat expedita cumque nostrum exercitationem inventore recusandae est,
                    accusantium quia repellendus quidem consequuntur ut omnis necessitatibus. Sapiente odit rem modi
                    nihil, quae blanditiis impedit nulla consectetur natus dolor vero, quaerat, ad numquam. Quia
                    laboriosam architecto fugit sed esse nostrum suscipit, commodi necessitatibus error quasi, accusamus
                    vitae asperiores hic dicta numquam ipsa vel blanditiis ratione consequatur praesentium amet modi
                    repellat! Vitae et nostrum, temporibus, pariatur laudantium eos facilis ipsam iusto labore autem
                    veniam odio magnam, maxime explicabo? Quod voluptate incidunt vitae repellendus quia assumenda,
                    harum hic dolorem ratione quam laboriosam debitis! Animi sit similique nemo ipsa repellat saepe
                    suscipit? Et fugiat, quos consectetur porro temporibus fuga saepe necessitatibus eius ipsam magni a
                    magnam laboriosam fugit. Esse eius repudiandae aliquam magnam quam accusamus animi reiciendis! Odit
                    iusto delectus voluptates dolore, quae numquam ratione sunt quia enim dolorem quis corporis natus
                    consectetur eos. Iure, similique adipisci. Optio consequuntur vitae nihil, dolores alias aperiam.
                    Cum tenetur eos, reiciendis eius necessitatibus, ipsum quaerat et facilis molestiae earum hic
                    corrupti sint autem porro magni? Deleniti rerum similique recusandae earum optio accusantium error
                    facilis eligendi aliquid eaque nemo dignissimos mollitia, voluptatum dolorem esse sed rem nostrum
                    praesentium fugiat adipisci eum ipsa corrupti culpa? Veritatis, officiis. Eos aliquam sapiente
                    beatae officiis delectus eligendi nisi culpa non rem nihil nulla eum explicabo doloremque maiores
                    tenetur, quibusdam quos! Aut, laborum quidem quaerat iste voluptatibus pariatur. Mollitia, corporis
                    voluptatum reprehenderit a velit vitae. Quod fuga sit vel? Veniam minus velit voluptates officia
                    consequuntur at. Ea maxime voluptatum eaque porro impedit corporis est saepe, ipsa, ipsum facilis
                    voluptas, dolor sunt? Deserunt consectetur dolorem nisi odit minima incidunt sequi, a voluptates
                    voluptate iure veritatis doloribus rerum eligendi? Nostrum quas quisquam eaque hic suscipit ratione
                    sed voluptate, voluptatibus non mollitia et voluptas ex error, magnam itaque. Voluptatum nemo odit
                    maiores expedita iste molestias doloremque ratione tenetur a in dolore sint non adipisci quo numquam
                    culpa voluptate deserunt tempore, totam sequi obcaecati debitis. Facere laboriosam temporibus ut
                    aliquid velit saepe porro doloremque autem deserunt placeat rem quos beatae officiis eum labore eius
                    explicabo harum nostrum, magnam sapiente quo voluptates. Sequi dolores vero velit numquam minus
                    beatae iure, aliquid ipsam placeat nesciunt, ab temporibus reiciendis laborum unde. Minus molestiae
                    hic molestias fuga voluptas maiores voluptatibus a, laboriosam enim ex. Amet vero quae, perspiciatis
                    reiciendis beatae voluptate. Laborum ipsa reiciendis distinctio modi aut quia dolorem nemo est
                    accusantium quis architecto atque ducimus rem, culpa iure et doloribus neque animi dolores enim quo
                    eos repellendus numquam! Mollitia, recusandae. Dolorem mollitia vero ut tempora sint porro nisi
                    provident eius non quaerat, alias ipsum quos modi nesciunt nemo sunt deleniti praesentium laudantium
                    ullam ratione adipisci dolorum! Voluptatibus ipsam praesentium debitis culpa consequuntur commodi
                    eveniet magni quae dolor dolores nesciunt incidunt distinctio amet facilis similique soluta
                    molestiae quisquam, nobis provident tenetur ducimus a ullam fuga quia. Vitae adipisci quia ad iure
                    excepturi voluptatum quaerat obcaecati numquam distinctio, earum quisquam nam mollitia, libero
                    minima ex rerum reprehenderit unde eligendi suscipit molestias possimus saepe sequi consequatur!
                    Quis suscipit dolor, doloremque commodi dolorem velit reprehenderit maiores explicabo nam
                    consequatur rem, enim totam. Quae iste inventore at illo culpa tempore numquam odit, fugiat, fuga ad
                    doloremque quia quo quam laborum sit nostrum voluptate expedita assumenda odio consequuntur
                    consectetur porro atque repellat! Non, atque saepe! Adipisci, dicta? Explicabo, ullam tempore
                    quaerat perferendis ex, minima numquam fugiat sed illo vel aperiam quod rerum et consequuntur alias
                    architecto, animi dolor reprehenderit laudantium iure itaque omnis. Nemo et eos animi ab unde
                    sapiente sunt incidunt ex reiciendis dolorem, molestiae porro iusto atque qui laborum eius mollitia
                    saepe vitae? Quibusdam aperiam consectetur molestiae velit voluptatibus, laudantium distinctio error
                    sapiente? Eos perspiciatis alias omnis consequatur molestiae quod quos natus ad reiciendis deleniti
                    culpa consequuntur, esse minima amet reprehenderit facere maxime placeat ab nesciunt delectus quo
                    ipsa quia neque.</p>

            </div>

        </div>


    </div>


</div>
<?php
include('layout_member/footer.php');
?>