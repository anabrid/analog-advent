<section class="day">
    <h2>Frequently asked questions</h2>
    
    <dl>
    
    <dt>Why is my day still unlocked? In which Time Zone is this Calendar?</dt>
    <dd>This calendar is strictly following German/Berlin timezone, i.e. UTC+1 (CET).
        Good for you if you are in the Americans, since the new day will open "earlier"
        for you. Bad for you if you are in east Asia since your day starts earlier then
        ours. The reason for a single time zone is that we reveal correct solutions for
        the quizzes the next day and don't want parts of the world being able to vote
        and others not.
           
    <dt>The website seems broken.</dt>
    <dd>This calendar is being worked on during december. Things were in fact broken on
        December 01st but we fixed them now. For instance, user <em>registration</em> was
        unfortunately not properly working on December 01st but is now.
        
    <dt>The questions are ill-posed or my answer was not correctly understood.
    <dd>Some multiple choice questions have no single answer but this is not bad, since in such
        a case both are correct. This is just to confuse you ;-).
        
    <dt>How exactly does the raffle of the price take place?
    <dd>First, the quality of your quiz results does NOT have any impact on your chances.
        This way, we do not favour the experts.
        The actual raffle will most likely take place early December 24 or, at maximum,
        before end of year. it follows an urn model.
        We will first make up a statistics how many
        days (i.e. quizzes) where handed in by participant. We will then apply a treshold,
        for instance people participating less then 50% will be excluded from the raffle. The
        treshhold will be fair, i.e. if you join this project around December 12 you should still
        be able to participate.
        Subsequently, we will most likely run the Python function
        <a href="https://pandas.pydata.org/pandas-docs/stable/reference/api/pandas.DataFrame.sample.html">df.sample</a>
        or <a href="https://docs.python.org/3/library/random.html#random.choice">random.choice</a>
        on the winning candidates. We will then look into the corresponding contact details. If
        they are sufficient to contact the winning candidate, we will try to contact him this
        way. If the contacting fails (if only postal data are given, we will wait several weeks
        for a reply), we will draw another candidate by chance.

        
    <dt>Can I help you out or report problems?</dt>
    <dd>A good place to start is the github repository of this project, which is
        <a href="https://github.com/anabrid/analog-advent/">github.com/anabrid/analog-advent</a>.
        You could report an issue or push request there.
        
    <dt>Who is behind this website?</dt>
    <dd>The Analog Advent Busy Beaver Computational Christmas Calendar was made by
        your favourite deep tech startup for unconventional computing paradigms, which is 
        of course <a href="https://anabrid.com">anabrid</a>. Anabrid made widely known produts
        such as <a href="https://the-analog-thing.org/">The Analog Thing</a> and many more.
        This calendar is not sponsored in particular. It is a side project of a single guy
        in the company.

    <dt>I love advent calendars like this one, can you name more of this kind?</dt>
    <dd>Insipration for this advent calendar was taken by the famous 
        <a href="https://adventofcode.com/">Advent of Code</a> and the German speaking
        <a href="https://www.physik-im-advent.de/">Physik im Advent</a>. Both are wonderful
        interactive projects and the Analog Advent is a very poor copy of them.
    
    <dt>Technically, this website is poorly written</dt>
    <dd><a href="https://github.com/anabrid/analog-advent/blob/master/README.md#design-choices-and-improvements-neccessary">I know</a>
        and I am happy for your constructive improvement. Frankly, the technical realization of 
        this side project was knocked together within a few hours. I hope the content makes you
        overlook the technical shortcomings.
        
    <dt>How can I contact you?</dt>
    <dd>Best is to write a mail to <a href="mailto:hello@anabrid.com">hello@anabrid.com</a>
    
    <dt>What about privacy, what do you do with all the data</dt>
    <dd>Nothing. The website code is open source and this page intentionally does not collect
        user data as with a regular registration (seperate forms for nickname and pasword,
                                                  saluation, prename, lastname, address, etc).
        The idea is that you remain anonymous unless you want to participate in the raffle.
        Of course we can send you an except of the data saved on our server once you name us
        your token. As you can read off the source code, this will be basically us running
        the command <tt>grep YourToken user_data/*.csv</tt>.
        Hint: We do not have leaderboards or similar. Your data will never be shared with others
        unless you aggree.
        
    <dt>Gosh, is this shit produced by ChatGPT?</dt>
    <dd>The ideas for this website and its implementation comes straight from the sick brain of a human being.
        Howveer, time is short and LLMs are cheap. Therefore ChatGPT was a good help in the
        design of the texts. I feel sorry for that. In particular I feel bad for all illustrations
        which clearly have the same origin. As always, (software) engineers do not make good
        illustrators. I also have mixed feelings for the font.
        However, I do not feel sorry about the silly snow effect. I liked the way
        the web looked in the 1990s and we should make more of this nonsense.
    
    </dl>
    
    <p>&nbsp;</p>
    
</section>
